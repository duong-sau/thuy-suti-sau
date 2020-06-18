@extends('master') @section('content')
<div class="row">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        {{--
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol> --}}

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/img_index/image-2.jpg" alt="Los Angeles">
                    </div>
                    <div class="item">
                        <img src="img/img_index/image-3.jpg" alt="Chicago">
                    </div>
                    <div class="item">
                        <img src="img/img_index/image-1-1.jpg" alt="Chicago">
                    </div>
                </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>



<!--  end content -->

<div class="row" id="icon_nen">
    <img src="img/img_index/icon.png" alt="icon" id="icon" class="animated inifinite fadeInDown">
    <h3 id="" class="animated inifinite fadeInDown">Sản phẩm nổi bật</h3>
    <hr>
</div>
<div class="container" id="container_sp3">
    <div id="content">
        <div class="row">
            @foreach($product1 as $pr1)
            <div class="col-md-2">
                <div class="row">
                    @if($pr1->gia_km!=0)
                    <div class="ribbon"><span>SALE</span></div>
                    @endif
                   <a href="{{ route('chi-tiet-san-pham',$pr1->id) }}" title="" id="text-decoration">
                        <img src="upload/sanpham/{{ $pr1->image }}" alt=""></a>
                        <p class="ten">{{ $pr1->name }}</p>
                        @if($pr1->gia_km!=0)
                         <lable class="giacu">{{number_format($pr1->unit_price,0,',','.') }}&nbsp;đ</lable>&nbsp;
                          <lable class="gia">{{ number_format($pr1->gia_km,0,',','.') }}&nbsp;đ</lable>
                         @else
                         <lable class="gia">{{ number_format($pr1->unit_price,0,',','.') }}&nbsp;đ</lable>
                         @endif <br>
                         <br>
                         <a href="{{ asset('cart/add/'.$pr1->id) }}" title="" id="text-decoration">
                        <label><button type="button" id="themgiohang"><i class="fas fa-cart-plus"></i></button></label></a>
                        <a href="{{ route('chi-tiet-san-pham',$pr1->id) }}" id="text-decoration">
                        <label><button type="button" id="ct"> Chi tiết</button></label></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            {{ $product1->links() }}
        </div>
    </div>
</div>


<div class="row" id="next_heads">
    <div class="container" id="" class="animated inifinite bounceInLeft">
        <div class="col-md-5">
            <img src="img/img_index/image-9.png" class="animated inifinite bounceInLeft">
        </div>
        <div class="col-md-offset-1 col-md-6">
            <h1 class="animated inifinite bounceInRight">Thông tin<br>Về cửa hàng</h1>
            <p class="animated infinite bounceInLeft">Thông tin về mô tả sản phầm được dẫn nguồn từ wikipedia</p>
            <p class="animated inifinite bounceInRight">Chúng tôi cung cấp trái cây nông sản tươi và rau cho khách hàng. Những người ghi nhớ nhóm của chúng tôi là các chuyên gia trang trại và làm vườn, những người giúp chúng tôi lựa chọn các sản phẩm chất lượng tốt nhất từ ​​nhà nông nông ở vùng đất của gia đình</p>
            
        </div>
    </div>
</div>
@endsection()