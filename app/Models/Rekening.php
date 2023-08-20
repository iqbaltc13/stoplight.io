<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $table = 'rekenings';
    public $timestamps = true;
    protected $guarded=[];


    public function log_transfers_from(){
		
		  return $this->hasMany('App\Models\LogTransfer', 'from_rekening_id','id');
	
	  }
    public function log_transfers_to(){
		
		  return $this->hasMany('App\Models\LogTransfer', 'to_rekening_id','id');
	
	  }
    public function user(){
      return $this->belongsTo('App\User','user_id','id');
    }
}
