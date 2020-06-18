@extends('master') @section('content')
   <hr>
<div class="container" style="padding-top:30px">
  
    <a href="trangchu.html" title=""><i class="fas fa-home"></i></a>/ @foreach($loai as $loai)
            {{ $loai->tenloai }}
             @endforeach
</div>
<div class="container-fluid" id="" style="padding-top:0px;padding-bottom: 70px">
    <div class="row" id="icon_nen" style="margin-top:-40px">
         <img src="img/img_index/icon.png" alt="icon" id="icon">
       <h3>Danh sách sản phẩm</h3>
       <hr>
    </div>
    <div class="container" id="container_sp1" style="margin-top:30px">
        <div class="row">
            @foreach($sp_theoloai as $sp)
            <div class="col-md-3" style="margin-top:100px">
                 <div class="row">
                    
                    <a href="{{ route('chi-tiet-san-pham',$sp->id) }}" title="" id="text-decoration">
                        <img src="upload/sanpham/{{ $sp->image }}" alt=""></a>
                        <p class="ten">{{ $sp->name }}</p>
                        
                         
                         
                         <lable class="gia">{{ number_format($sp->unit_price,0,',','.') }}&nbsp;đ</lable>
                    
                         <br>
                         <a href="{{ asset('cart/add/'.$sp->id) }}" title="" id="text-decoration">
                        <label><button type="button" id="themgiohang"><i class="fas fa-cart-plus"></i></button></label></a>
                        <a href="{{ route('chi-tiet-san-pham',$sp->id) }}" id="text-decoration">
                        <label><button type="button" id="ct"> Chi tiết</button></label></a>
                    </div>
            </div>
            @endforeach
        </div>
         <div class="row">
            {{ $sp_theoloai->links() }}
        </div>
   </div>
    
</div>
@endsection()