<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogTransfer extends Model
{
    protected $table = 'log_transfers';
    public $timestamps = true;
    protected $guarded=[];

    public function rekening_to(){
        return $this->belongsTo('App\Models\Rekening','from_rekening_id','id');
    }
    public function rekening_from(){
        return $this->belongsTo('App\Models\Rekening','to_rekening_id','id');
    }
}
