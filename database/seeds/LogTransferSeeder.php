<?php

use Illuminate\Database\Seeder;
use App\Models\LogTransfer;
use App\Models\Rekening;
use Illuminate\Database\QueryException;

class LogTransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->command->info('disabling foreignkeys check');
        Schema::disableForeignKeyConstraints();
        $this->command->info('truncating log_transfers...');
        DB::table('log_transfers')->truncate();
        Schema::enableForeignKeyConstraints();
        $rekenings =  Rekening::with([])->get();
        
        DB::beginTransaction();
        try{

            for ($i=0; $i<1000; $i++) { 
                $from = rand(0,sizeof($rekenings)-1);
                $to = rand(0,sizeof($rekenings)-1);
                while($from == $to){
                    $to = rand(0,sizeof($rekenings)-1);
                }
                $amount = rand(0,100) * 100;
                $createLogTransfer = LogTransfer::create([
                    'from_rekening_id'=>$rekenings[$from]->id,
                    'to_rekening_id'=>$rekenings[$to]->id,
                    'amount'=>$amount,
                    'created_by_id' =>0,
                ]);
                Rekening::where('id', $rekenings[$from]->id)->decrement('amount', $amount);
                Rekening::where('id', $rekenings[$to]->id)->increment('amount', $amount);  
            }    

            DB::commit();
        }catch(QueryException $ex){

            DB::rollback();
        }
    }
}
