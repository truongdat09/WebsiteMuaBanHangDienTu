@extends('layout')
@section('content')
<?php
$errol = Session::get('errol');
if ($errol) {
echo '<div class="alert alert-success">' . $errol . '</div>';
Session::put('errol', null);
}
?>
@foreach($khachhang as $key => $value)
<div class="section">
    <form action="{{URL::to('/cap-nhat-thong-tin')}}" method="post">
        @csrf
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- Information account -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">thông tin tài khoản</h3>
                        </div>
                        <input type="hidden" name="SDT_KH" id="" value="{{$value->SDT_KH}}">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input name="TENKH" class="input" type="text" value="{{$value->TENKH}}" placeholder="Họ và tên khách hàng">
                        </div>
                        <div class="form-group">
                            <label for="">Tên đăng nhập/Email</label>
                            <input name="EMAIL" class="input" type="email" value="{{$value->EMAIL}}" placeholder="Tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input name="MATKHAU" class="input" type="text" value="{{$value->MATKHAU}}" placeholder="Mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input name="DIACHI" class="input" type="text" value="{{$value->DIACHI}}" placeholder="Địa chỉ khách hàng">
                        </div>
                    </div>
                    <!-- Information account -->
                    <button type="submit" id="btnCapNhat" class="primary-btn order-submit"> CẬP NHẬT</button>
                </div>
                <!-- Thoong tin dia chi giao hang -->
                <div class="col-md-6 order-details">
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Địa chỉ giao hàng</h3>
                        </div>
                        <div class="form-group">
                            <label for="">Họ & tên người nhận</label>
                            <input name="TEN_NHANHANG" class="input" type="text" value="{{$value->TEN_NHANHANG}}" placeholder="Họ và tên người nhận hàng">
                        </div>
                        <div class="form-group">
                            <label for="">Email đặt hàng</label>
                            <input disabled name="EMAIL_NHANHANG" class="input" type="text" value="{{$value->EMAIL}}" placeholder="Email đặt hàng">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ nhận hàng</label>
                            <input name="DIACHI_NHANHANG" class="input" type="text" value="{{$value->DIACHI_NHANHANG}}" placeholder="Địa chỉ nhận hàng">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại nhận hàng</label>
                            <input name="SDT_NHANHANG" class="input" type="text" value="{{$value->SDT_NHANHANG}}" placeholder="Số điện thoại nhận hàng">
                        </div>
                    </div>
                    <!-- /Thoong tin dia chi giao hang -->
                </div>
            </div>
        </div>
    </form>
</div>
@endforeach
@endsection