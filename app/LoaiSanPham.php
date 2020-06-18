<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
	//khi muon import can them phan fillable
	protected $fillable = [
      'id', 'tenloai'
    ];

    protected $table="loai_sp";

    public function sanpham(){
    	return $this->hasMany('App\sanpham','id_loai_sp','id');
    	//-----------là khóa ngoại của bảng sản phẩm--,là khóa chính của bảng loại sản phẩm-----
    }
}
