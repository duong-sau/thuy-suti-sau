@extends('master')
@section('content')
<script type="text/javascript" >
    function updateCart(qty,rowId){
        console.log(qty);
        console.log(rowId);
        $.get(
            '{{ asset('cart/update')}}',
            {qty:qty,rowId:rowId},
            function(){
                location.reload();
            }
            );
    }
</script>
<hr>
 <div id="" style="padding-bottom: 80px">
        <div class="row">
            <form>
             @if(Cart::count()>=1)
            <table id="tbl_giohang">
                <caption>Giỏ hàng</caption>
                <br>
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>sl kho</th>
                        <th>Thành tiền</th>
                        <th><i class="fas fa-trash-alt"></i></th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}
                            <p style="display:none">{{ $item->id }}</p>
                        </td>
                        <td><img src="upload/sanpham/{{ $item->options->img }}" alt="" style="height: 120px;width: 120px"></td>
                        <td style="color:red">{{ number_format($item->price,0,',','.') }}
                            <p style="color:#444">/&nbsp;&nbsp;{{ $item->options->dv }}</p>
                        </td>
                        <td>
                            <input type="number" min="1" max="{{ $item->options->sl }}" value="{{ $item->qty }}" id="soluong" onchange="updateCart(this.value,'{{ $item->rowId }}')">
                        </td>
                        <td>{{ $item->options->sl }}</td>
                        <td style="color:red">{{ number_format($item->price*$item->qty,0,',','.') }}</td>
                        <td><a href="{{asset('cart/delete/'.$item->rowId)}}" title=""><i class="fas fa-trash-alt" style="color:red"></i></a></td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </form>
        </div>
        <div class="row" style="margin-top:50px">
            <div class="col-md-offset-8 col-md-2" id="">
                <p class="ten" style="color:red;font-size:18px">Tổng tiền:&nbsp;&nbsp;&nbsp;&nbsp;{{ $total}}
                </p>
            </div>
        </div>
        <div class="row">
             <div class="col-md-offset-8 col-md-2" id="">
             <a href="{{asset('cart/delete/all')}}" title="">
             <button type="button" class="btn btn-danger">Xóa hết giỏ hàng&nbsp;&nbsp;<i class="fas fa-trash-alt" style=""></i></button></a>
         </div>
        </div>
          <div class="container">
            <div class="row">
                        <h3>Thông tin giao hàng</h3>
                    </div>
              <form action="{{ route('sendmail') }}" method="post" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-5">
                    @if(Auth::check())
                    <input type="email" class="form-control has-error" name="email" placeholder="Email" value="{{ Auth::user()->email }}"/><br>
                    <input type="text" class="form-control" name="hoten" placeholder="Họ tên" value="{{ Auth::user()->full_name }}"><br>
                    <input type="text" class="form-control" name="sdt" placeholder="Số điện thoại" value="{{ Auth::user()->phone }}"><br>
                    <input type="text" class="form-control" name="dc" placeholder="Địa chỉ" value="{{ Auth::user()->address }}"><br>
                    @else
                     <input type="email" class="form-control has-error" name="email" placeholder="Email" /><br>
                    <input type="text" class="form-control" name="hoten" placeholder="Họ tên:Không để trống" ><br>
                    <input type="text" class="form-control" name="sdt" placeholder="Số điện thoại" ><br>
                    <input type="text" class="form-control" name="dc" placeholder="Địa chỉ" ><br>
                    @endif
                    <textarea class="form-control" rows="3" placeholder="Ghi chú" style="width: 455px;" name="note"></textarea>
                </div>
                <div class="col-md-offset-1 col-md-5">
                    <div class="row">
                        <p style="font-size: 20px;font-weight: bold;">Hình thức thanh toán</p>
                    </div>
                    <div class="row" id="">
                        <input type="radio" name="payment" checked>  &nbsp;&nbsp;&nbsp;<label>Thanh toán khi nhận hàng</label><br>                    
                    {{--   <input type="radio" name="payment">  &nbsp;&nbsp;&nbsp;<label>Thanh toán bằng thẻ ATM</label> --}}
                        
                    </div>
                    <div class="row" style="margin-top:50px;">
                        <div class="col-md-5">
                            <a href="" title="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Quay lại giỏ hàng</button></a>
                        </div>
                         <div class="col-md-5">
                            <a href="" title="">
                                <input type="submit" style="padding:7px; background-color: red;color:#FFF;border:1px solid;border-radius: 5px" value="Xác nhận đơn hàng"></a>
                        </div>
                    </div>
                </div>
            </div>
              </form>
        </div>
       
    </div>
     @else
        <table id="tbl_giohang" style="margin-bottom: 100px">
        <tr>
            <td>Giỏ hàng rỗng</td>
        </tr>
    </table>
        @endif
    @endsection