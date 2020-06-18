<div>
  <div>
    <h3><font color="#FF9600">Thông tin khách hàng</font></h3>
    <p>
      <strong class="info">Khách hàng:</strong>
      {{ $info['hoten'] }}
    </p>
    <p>
      <strong class="info">Email:</strong>
      {{ $info['email'] }}
    </p>
    <p>
      <strong class="info">Điện thoại:</strong>
      {{ $info['sdt'] }}
    </p>
    <p>
      <strong class="info">Địa chỉ:</strong>
      {{ $info['dc'] }}
    </p>
  </div>
  <div>
    <h3><font color="$FF9600">Hóa đơn mua hàng</font></h3>
         <table id="tbl_giohang">
                <caption>Giỏ hàng</caption>
                <br>
               
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th><i class="fas fa-trash-alt"></i></th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price,0,',','.')}} VNĐ</td>
                        <td>{{ $item->qty }}</td>                          
                        <td >{{ number_format($item->price*$item->qty,0,',','.') }} VNĐ</td>
                    </tr>
                   @endforeach
                   <tr>
                    <td>Tổng tiền:</td>
                    <td colspan="3" align="right">{{ $total }}VNĐ</td>
                   </tr>
                </tbody>
            </table>
  </div>
</div>