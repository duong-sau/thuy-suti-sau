<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_Ban extends Model
{
	 protected $fillable = [
      'id_kh', 'date_order','tong_tien','payment','status'
    ];
     protected $table="bills_ban";

    public function khachhang(){
    	return $this->belongsTo('App\Customer','id_kh','id');}

    public function ct_hoadon(){
    	return $this->hasMany('App\Bill_Detail_ban','id_bill_ban','id');
    }
}
