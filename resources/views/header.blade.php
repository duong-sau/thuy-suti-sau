 <div class="row" id="head_menu">
            <img src="img/img_index/logo.png" id="logo" alt="logo" class="animated inifinite bounceInLeft">
            <form role="search" action="{{ route('search') }}" method="get" accept-charset="utf-8">
                <input type="text" id="ip_seach" name="key" value="" placeholder="  Tìm kiếm... " class="animated inifinite bounceInDown">
            <button type="submit" class="fa fa-search" style="height: 34px;border-radius: 5px;border:1px solid #EEE;background-color: #EEE"></button>
             </form>
            <ul  id="menu_head">
                @if(Auth::check()){{-- nếu =true tức người dùng đã đăng nhập --}}
              {<li>
                <div class="dropdown" style="margin-right: 30px">
                @if(Auth::user()->image=="")
                <i class="fas fa-user-circle"></i>&nbsp;
                @else
               <img src="img/img_dai_dien/{{ Auth::user()->image }}" style="width: 30px;height: 30px;border-radius: 180px">
                @endif
                <label class="li">{{ Auth::user()->users_name }}</label>
              
                    <a href="" title="" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-chevron-down"></i></a>
                     <div class="dropdown-menu">
                       <ul style="margin-right: 30px;margin-top:10px">
                           
                           <a href="{{ route('logout') }}" title=""><li style="margin-left:-50px;margin-bottom:0px;margin-top:15px;">Đăng xuất</li></a>
                       </ul>
                     </div>
                </div>
            </li>}
               
               @else
                <a href="{{ route('dang-nhap') }}" title="">
                    <li class="li">ĐĂNG NHẬP</li>
                </a>
                <a href="{{ route('dang-ky') }}" title="">
                    <li class="li">ĐĂNG KÝ</li>
                </a>
                @endif
                   <li class="li">
                    {{-- <div class="dropdown">   --}}     
                     <a href="{{ asset('cart/show') }}" title="">      
                    <i class="fas fa-cart-plus" size="20px"></i></a>
                      <span id="hiensoluong">
                    {{ Cart::count() }}
                     &nbsp;</span>
                      {{-- <ul class="dropdown-menu">
                        <div class="col-md-12" style="width: 300px;">
                             @if(Session::has('cart'))
                            @foreach($product_cart as $pro)
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="public/img/img_sp/{{ $pro['item']['image'] }}" alt="" style="width: 100px;height: 100px">
                                </div>
                                <div class="col-md-offset-1 col-md-6">
                                    <p>{{ $pro['item']['name'] }}</p>
                                    <p>{{ $pro['qty'] }}*<span style="color:red">{{ number_format($pro['item']['unit_price']) }}</span></p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">  
                                     @if(Session::has('cart'))
                                    Tổng tiền:&nbsp;&nbsp; 
                                    <span style="color:red">
                                        {{ number_format(Session('cart')->totalPrice) }}
                                    </span>         
                                   @endif  
                                </div>
                            </div>
                            
                        </div>
                      </ul>
                    </div> --}}
                </li>   
                <li>
                    
                </li>
                <li id="danhmuc">
                    <div class="dropdown">
                        <button class="dropbtn" style="font-weight: bold">MENU&nbsp;<i class="fas fa-chevron-down"></i></button>
                        <div class="dropdown-content" style="">
                            <div class="row" id="rong">
                                <div class="col-md-12">
                                    <div  style="margin-top:20px">
                                        @foreach($loai_sp as $loai)
                                         <a href="{{ route('loai-san-pham',$loai->id) }}" class=""><i class="fas fa-caret-right"></i>&nbsp;&nbsp;&nbsp;{{ $loai->tenloai }}</a>
                                         @endforeach

                                    </div>
                                   
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                <a href="index" title="">
                    <li class="li">TRANG CHỦ</li>
                </a>
            </ul>
        </div>