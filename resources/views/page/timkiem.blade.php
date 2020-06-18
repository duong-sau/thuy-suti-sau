@extends('master') @section('content')
<div class="row" id="icon_nen">
    <img src="img/img_index/icon.png" alt="icon" id="icon" >
    <h3 id="" >Sản phẩm tìm kiếm</h3>
    <hr>
    <div class="row" style="text-align: center;">
            <p style="font-size: 16px">Tìm thấy {{count($product)}} sản phẩm</p>
        </div>
</div>
<div class="container" id="container_sp" style="margin-bottom: 100px">
    <div id="content">
        <div class="row">
            @foreach($product as $pr)
            <div class="col-md-3">
                <div class="row">
                    @if($pr->gia_km!=0)
                    <div class="ribbon"><span>SALE</span></div>
                    @endif
                    <a href="{{ route('chi-tiet-san-pham',$pr->id) }}" title="" id="text-decoration">
                        <img src="upload/sanpham/{{ $pr->image }}" alt=""></a>
                        <p class="ten">{{ $pr->name }}</p>
                        @if($pr->gia_km!=0)
                         <lable class="giacu">{{number_format($pr->unit_price) }}&nbsp;đ</lable>&nbsp;
                          <lable class="gia">{{ number_format($pr->gia_km) }}&nbsp;đ</lable>
                         @else
                         <lable class="gia">{{ number_format($pr->unit_price) }}&nbsp;đ</lable>
                         @endif <br>
                         <br>
                         <a href="{{ asset('cart/add/'.$pr->id) }}" title="" id="text-decoration">
                        <label><button type="button" id="themgiohang"><i class="fas fa-cart-plus"></i></button></label></a>
                        <a href="{{ route('chi-tiet-san-pham',$pr->id) }}" id="text-decoration">
                        <label><button type="button" id="ct"> Chi tiết</button></label></a></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection