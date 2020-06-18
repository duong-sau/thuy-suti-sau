<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	 protected $fillable = [
      'ten_kh', 'email','dia_chi','sdt'
    ];
     protected $table="khach_hang";

      public function hoadon(){
    	return $this->hasMany('App\Bill_Ban','id_kh','id');
    }
}
