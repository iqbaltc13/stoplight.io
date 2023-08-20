<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogTransfer;
use App\Models\Rekening;
use App\User;
use Auth;
use Illuminate\Database\QueryException;
use DB;

class WalletController extends Controller
{
    public function __construct()
    {
        
    }
    public function transfer(Request $request){

    }
    public function createUser(Request $request){

    }
    public function balanceTopup(Request $request){
        $topUpAmount = $request->json()->get('amount');
        if($topUpAmount < 1 || $topUpAmount >= 10000000){
            return response()->json('Invalid topup amount', 400);
        } 
        try { 
            $data =  Rekening::with([])->->whereNull('deleted_at')->where('user_id',Auth::id())->increment('amount', $topUpAmount);
          } catch(QueryException $ex){ 
            
            // Note any method of class PDOException can be called on $ex.
        }
        
       
        return response()->json('Topup successful', 204);
    }
    public function balanceRead(Request $request){
        try { 
            $data =  Rekening::with([])->->whereNull('deleted_at')->where('user_id',Auth::id())->first();
          } catch(QueryException $ex){ 
            
            // Note any method of class PDOException can be called on $ex.
          }
        if($data){
            $result = [
                'balance' => $data->amount,
            ];
        }
       
        return response()->json($result, 200);
    }
    public function topUsers(Request $request){
        try { 
            $dataRekening =  Rekening::with([])->where('user_id',Auth::id())->first();
            if($dataRekening){
                $dataTransfers = LogTransfer::with(['rekening_to','rekening_to.user'])
                                ->select("*", DB::raw('sum(amount) as transacted_value'))
                                ->where(function($query) use ($dataRekening){
                                    
                                    $query->orWhere('to_rekening_id',$dataRekening->id);
                                })->whereNull('deleted_at')->orderBy('amount','DESC')->groupBy('to_rekening_id')->get();;
            }
            
          } catch(QueryException $ex){ 
            
            // Note any method of class PDOException can be called on $ex.
        }
        $results = [];
        if($dataRekening){
            
            foreach ($dataTransfers as $key => $value) {
                $result = [];
                
                $result['username'] = $value[];
                $result['transacted_value'] = -1 * $value->amount;
                
                array_push($results,$result)
            }
        }
       
        return response()->json($results, 200);
    }
    public function topTransactionsPerUser(Request $request){
        try { 
            $dataRekening =  Rekening::with([])->where('user_id',Auth::id())->first();
            if($dataRekening){
                $dataTransfers = LogTransfer::with(['rekening_to','rekening_to.user','rekening_from','rekening_from.user'])
                                ->where(function($query) use ($dataRekening){
                                    $query->where('from_rekening_id',$dataRekening->id);
                                    $query->orWhere('to_rekening_id',$dataRekening->id);
                                })->whereNull('deleted_at')->orderBy('amount','DESC')->get();;
            }
            
          } catch(QueryException $ex){ 
            
            // Note any method of class PDOException can be called on $ex.
        }
        $results = [];
        if($dataRekening){
            
            foreach ($dataTransfers as $key => $value) {
                $result = [];
                if($value->from_rekening_id == $dataRekening->id ){
                    $result['username'] = $value->rekening_to->user->username;
                    $result['amount'] = -1 * $value->amount;
                }
                elseif($value->to_rekening_id == $dataRekening->id){
                    $result['username'] = $value->rekening_from->user->username;
                    $result['amount'] =  $value->amount;

                }
                array_push($results,$result)
            }
        }
       
        return response()->json($results, 200);
    }
}
