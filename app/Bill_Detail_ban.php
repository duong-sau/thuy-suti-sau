<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_Detail_ban extends Model
{
	 protected $fillable = [
      'id_bill_ban', 'id_sp','sl'
    ];
    protected $table="bill_detail_ban";

     public function hoadon(){
    	return $this->belongsTo('App\Bill_ban','id_bill_ban','id');
    }
}
