 @extends('master')
@section('content')
 <div id="anhfull1">
        <div class="container">
            <div class="row">
                        <h3>Thông tin giao hàng</h3>
                    </div>
            <div class="row">
                <div class="col-md-5">
                    <input type="email" class="form-control has-error" id="email" placeholder="Email" onblur="kt_email()" />
                    <span id="span1" style="color: red"></span>
                    <input type="text" class="form-control" id="hoten" placeholder="Họ tên" onblur="kt_hoten()">
                    <span id="span2" style="color: red"></span>
                    <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại" onblur="kt_sdt()">
                    <span id="span3" style="color: red"></span>
                    <input type="text" class="form-control" id="dc" placeholder="Địa chỉ" onblur="kt_dc()">
                    <span id="span4" style="color: red"></span>
                    <div id="div4">
                        <label>Chọn tỉnh thành</label>
                        <select>
                            <option value="0">Ân thi</option>
                            <option value="1">Hưng Yên</option>
                            <option value="2">Hải Dương</option>
                        </select>
                    </div>
                    <div id="div4">
                        <label>Chọn quận huyện</label>
                        <select>
                            <option value="0">Mỹ Hào</option>
                            <option value="1">Ân thi</option>
                            <option value="2">Mỹ Hào</option>
                        </select>
                    </div>
                    <textarea class="form-control" rows="3" placeholder="Ghi chú" style="width: 455px;"></textarea>
                </div>
                <div class="col-md-offset-1 col-md-5">
                    <div class="row">
                        <p style="font-size: 20px;font-weight: bold;">Vận chuyển</p>
                    </div>
                    <div class="row" id="class_giaohang">
                        <div class="col-md-8" style="margin-top:19px"><img src="img/icon/thanh_toan.png" alt="">Giao hàng tận nơi</div>
                        <div class="col-md-4" style="margin-top:19px;text-align: right; font-weight: bold"> 30.000đ</div>
                    </div>
                    <div class="row" style="margin-top:50px;">
                        <div class="col-md-5">
                            <a href="" title="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Quay lại giỏ hàng</button></a>
                        </div>
                         <div class="col-md-5">
                            <a href="" title="">
                                <button type="button" class="btn btn-danger">Xác nhận đơn hàng</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection