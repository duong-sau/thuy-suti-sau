<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use Cart;
use Mail;
use App\Customer;
use App\Bill_Ban;
use App\Bill_Detail_ban;

class ShoppingCartController extends Controller
{
    public function getAddCart($id){
    	$sanpham=sanpham::find($id);
    	Cart::add(['id'=>$id,'name'=>$sanpham->name,'qty'=>1,'price'=>$sanpham->unit_price,'options'=>['img'=>$sanpham->image,'dv'=>$sanpham->don_vi_tinh,'sl'=>$sanpham->so_luong]]);
    	return redirect('cart/show');
    }
    public function getShowCart(){
    	$data['total']=Cart::total();
    	$data['items']=Cart::content();
    	return view('page.gio_hang',$data);
    }
    public function getDeleteCart($id){
        if($id=='all'){
            Cart::destroy();//xóa hết
        }else{
            Cart::remove($id);
        }
    	return back();
    }

    public function getUpdateCart(Request $req){
        Cart::update($req->rowId,$req->qty);
    }

    public function postCompleted(Request $req){
         $this->validate($req,
            [
            'email'=>'required|email',  
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',     
        ]);
        $customer=new Customer;
        $customer->ten_kh=$req->hoten;
        $customer->email=$req->email;
        $customer->dia_chi=$req->dc;
        $customer->sdt=$req->sdt;
        $customer->note=$req->note;
        $customer->save();
         $data=Cart::content();
        $bill=new Bill_Ban;
        $bill->id_kh=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->tong_tien=str_replace(',', '', Cart::total());
        $bill->payment=$req->payment;
        $bill->Status=1;
        $bill->note=$req->note;
        $bill->save();

        if(count($data)>0){
            foreach($data as $key=>$item){
                $bill_detail=new Bill_Detail_ban;
                $bill_detail->id_bill_ban=$bill->id;
                $bill_detail->id_sp=$item->id;
                $bill_detail->sl=$item->qty;
                $bill_detail->save();
                $sp=sanpham::find($item->id);
                $sp->so_luong=$sp->so_luong-$item->qty;
                $sp->save();
            }
        }
        // $data['info']=$req->all();
        // $email=$req->email;
        // $data['total']=Cart::total();
        // $data['cart']=Cart::content();
        // Mail::send('admin_page.email',$data,function($message) use($email){
        //     $message->from('doanlinh1098@gmail.com','Thuc Pham Sach');
        //     $message->to($email,$email);
        //     $message->cc('doanlinh1098@gmail.com','Linh Doan');
        //     $message->subject('Xác nhận đơn hàng');
        // });
        Cart::destroy();
       return redirect('complete');
        
    }

    public function getComplete(){
        return view("admin_page.complete");
    }
}
