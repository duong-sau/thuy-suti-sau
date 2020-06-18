<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    //khi muon import can them phan fillable
    protected $fillable = [
      'id', 'name','id_loai_sp','mota_sp','unit_price','gia_km','so_luong','image','don_vi_tinh'
    ];

    protected $table="san_pham";
    // protected $dateFormat = 'd-m-Y';

    public function loaisp(){
    	return $this->belongsTo('App\LoaiSanPham','id_loai_sp','id');
    	// belongTo:thuộc về,khóa ngoại của bảng sản phẩm,khóa chính của bảng sản phẩm

    	// public function chitiet_hd_nhap(){
    	// 	return $this->hasMany('App\Bill_Detail_Nhap','')
    	// }
    }
}
