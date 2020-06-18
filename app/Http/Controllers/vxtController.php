<?php

namespace App\Http\Controllers;
use App\LoaiSanPham;
use Illuminate\Http\Request;

class vxtController extends Controller
{
    //
    function getAll(){
    	return view('vxt');
    }
    function getIndex(){
    	$loaisp=LoaiSanPham::all();
    	return response()->json($loaisp);
    }
    function getVxtID($id){
    	$loaisp=LoaiSanPham::find($id);
    	return response()->json($loaisp);
    }
     function getVxtDelete($id){
    	$loaisp=LoaiSanPham::find($id);
    	$loaisp->status=false;
    	$loaisp->save();
    	return response()->json($loaisp);
    }
    function getVxtPost(Request $id){
    	$loaisp=new LoaiSanPham();
    	if($id->loaidang="update"){
    		$loaisp=LoaiSanPham::find($id->id);
    	}
    	$loaisp->ten_loai= $id->ten_loai;
    	$loaisp->save();
    	return response()->json($loaisp);
    }
}
