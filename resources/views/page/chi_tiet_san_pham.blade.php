 @extends('master') @section('content')
<div id="anhfull1">
    <div class="container" id="chitiet" style="background-color: #FFF">
        <div class="col-md-1">
            {{-- <div class="row">
                <img src="upload/sanpham/{{ $sp->image }}" alt="ảnh {{ $sp->name }}">
            </div>
            <div class="row">
                 <img src="upload/sanpham/{{ $sp->image }}" alt="ảnh {{ $sp->name }}">
            </div> --}}
        </div>
        <div class="col-md-5">
             <img src="upload/sanpham/{{ $sp->image }}" alt="ảnh {{ $sp->name }}" id="anhchitiet">
        </div>
        <div class="col-md-offset-1 col-md-4" id="thongtindongia">
            <h3 style="font-size:30px">{{ $sp->name }}</h3>
         
             @if($sp->gia_km!=0)
                <lable class="giacu" style="font-size:30px">{{ number_format($sp->unit_price,0,',','.') }}&nbsp;đ</lable>&nbsp;/{{ $sp->don_vi_tinh }}
                <lable class="gia" style="font-size:30px">{{ number_format($sp->gia_km,0,',','.') }}&nbsp;đ</lable>&nbsp;/{{ $sp->don_vi_tinh }}
             @else
                <lable class="gia" style="font-size:30px">{{ number_format($sp->unit_price,0,',','.') }}&nbsp;đ</lable>&nbsp;/{{ $sp->don_vi_tinh }}
              @endif
            <br>
            <p style="color:#777;font-size:14px">Vận chuyển: &nbsp; Giao hàng từ thứ 2-> thứ 7</p>
            <p style="color:#777;font-size:14px;margin-bottom: 20px">Phí vận chuyển: &nbsp;30.000đ/toàn quốc</p>
            <a href="{{ asset('cart/add/'.$sp->id) }}" title="" id="text-decoration">
                 <button type="button" class="btn btn-danger" {{-- data-toggle="modal" data-target="#myModal" --}} id="ip" style="background-color: #0033FF;"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;Thêm vào giỏ hàng</button>
            </a>
        </div>
    </div>
</div>


<div class="container" id="maginle">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">THÔNG TIN CHI TIẾT</a></li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <p>{!!$sp->mota_sp!!}</p>
        </div>
        
         
    </div>
</div>

<div class="row" id="icon_nen" >
    <img src="img/img_index/icon.png" alt="icon" id="icon" >
    <h3 id="">Sản phẩm tương tự</h3>
    <hr>
</div>
<div class="container" id="container_sp" style="margin-bottom: 50px">
    <div id="content">
        <div class="row">
            <br><br><br>
            @foreach($product as $new)
            <div class="col-md-3">
                <div class="row">
                    @if($new->gia_km!=0)
                    <div class="ribbon"><span>SALE</span></div>
                    @endif
                    <a href="{{ route('chi-tiet-san-pham',$new->id) }}" title="" id="text-decoration">
                        <img src="upload/sanpham/{{ $new->image }}" alt=""></a>
                        <p class="ten">{{ $new->name }}</p>
                        @if($new->gia_km!=0)
                         <lable class="giacu">{{number_format($new->unit_price,0,',','.') }}&nbsp;đ</lable>&nbsp;
                          <lable class="gia">{{ number_format($new->gia_km,0,',','.') }}&nbsp;đ</lable>
                         @else
                         <lable class="gia">{{ number_format($new->unit_price,0,',','.') }}&nbsp;đ</lable>
                         @endif <br>
                         <br>
                         <a href="{{ asset('cart/add/'.$new->id) }}" title="" id="text-decoration">
                        <label><button type="button" id="themgiohang"><i class="fas fa-cart-plus"></i></button></label></a>
                        <a href="{{ route('chi-tiet-san-pham',$new->id) }}" id="text-decoration">
                        <label><button type="button" id="ct"> Chi tiết</button></label></a>                    
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            {{ $product->links() }}
        </div>
    </div>
</div>
@endsection()