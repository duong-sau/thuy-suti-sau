 @extends('master') @section('content')
<div id="">
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @if(Session::has('flag'))
                <div class="alert alert-{{ Session::get('flag') }}">
                    {{ Session::get('tb') }}
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-offset-4 col-md-4" style="margin-bottom: 100px">
            <h4>ĐĂNG NHẬP</h4><br>
            <form action="{{ route('dang-nhap') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group has-feedback has-feedback-left">
                    <label class="red">*</label><input type="text" class="form-control" required name="email" value="duongsau1211@gmail.com" placeholder="(gợi ý) duongsau1211@gmail.com ">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>
                <div class="form-group has-feedback has-feedback-left">
                    <label class="red">*</label><input type="password" class="form-control"  required name="password" placeholder="Password (gợi ý) 123456" value="123456">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>
                <div class="form-group login-options">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" checked="checked"> Remember
                            </label>
                        </div>

                        {{--
                        <div class="col-sm-6 text-right">
                            <a href="login_password_recover.html">Forgot password?</a>
                        </div> --}}
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-primary">Login <i class="icon-arrow-right14 position-right"></i></button>
                </div>
        </form>
        </div>
    </div>
</div>
@endsection()