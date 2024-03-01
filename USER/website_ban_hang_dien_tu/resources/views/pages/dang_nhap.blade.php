@extends('layout')
@section('content')
<br><br>
<style>
    .rounded-image {
        overflow: hidden;
        border-radius: 10px;
        /* Điều chỉnh giá trị để bo tròn theo mong muốn */
    }

    .rounded-image img {
        width: 100%;
        /* Đảm bảo ảnh điền đầy phần nội dung được bo tròn */
        height: auto;
        /* Đảm bảo tỷ lệ khung hình của ảnh được giữ nguyên */
        display: block;
        /* Loại bỏ khoảng trắng dư thừa dưới ảnh */
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6"><br><br><br><br>
            <div class="card">
                <h2 style="text-align: center;">ĐĂNG NHẬP TÀI KHOẢN</h2><br>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<div class="alert alert-success">' . $message . '</div>';
                    Session::put('message', null);
                }
                $thanhcong = Session::get('thanhcong');
                if ($thanhcong) {
                    echo '<div class="alert alert-success">' . $thanhcong . '</div>';
                    Session::put('thanhcong', null);
                }
                $tb_chuaDangNhap = Session::get('tb_chuaDangNhap');
                if ($tb_chuaDangNhap) {
                    echo '<div class="alert alert-success">' . $tb_chuaDangNhap . '</div>';
                    Session::put('tb_chuaDangNhap', null);
                }
                $dangnhaptheodoidonhang = Session::get('dangnhap_theodoi_donhang');
                if ($dangnhaptheodoidonhang) {
                    echo '<div class="alert alert-success">' . $dangnhaptheodoidonhang . '</div>';
                    Session::forget('dangnhap_theodoi_donhang');
                }
                $success = Session::get('success');
                if ($success) {
                    echo '<div class="alert alert-success">' . $success . '</div>';
                    Session::put('success', null);
                }                
                $dangnhaptk = Session::get('dangnhap_taikhoan');
                if ($dangnhaptk) {
                    echo '<div class="alert alert-success">' . $dangnhaptk . '</div>';
                    Session::put('dangnhap_taikhoan', null);
                }
                ?>
                <div class="card-body">
                    <form method="POST" action="{{URL::to('/user-dashboard')}}">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <i class="fa fa-user"></i>&nbsp;<label for="email" class="form-label">Tên đăng nhập</label><b style="color:red;">*</b>
                            <br>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <br>
                        </div>

                        <div class="mb-3">
                            <i class="fa fa-lock"></i>&nbsp;<label for="password" class="form-label">Mật khẩu</label><b style="color:red;">*</b>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nhập mật khẩu" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                <span id="passwordLabel">Hiện mật khẩu</span>
                            </label>
                        </div>

                        <br><br>

                        <div class="d-grid gap-2">
                            <button type="submit" class="primary-btn btn-block">Đăng Nhập</button>
                        </div>
                    </form>
                </div>
                <br>
                <div class="card-footer text-center">
                    <p class="mb-0">Bạn chưa có tài khoản? <a href="{{URL::to('/dang-ky-tai-khoan')}}">Đăng ký ngay</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="rounded-image">
                <img src="{{asset('public/frontend/img/dangnhap.gif')}}" alt="">
            </div>
        </div>
    </div>
</div>
<br>
<script>
    // JavaScript code
    var passwordCheckbox = document.getElementById('remember');
    var passwordLabel = document.getElementById('passwordLabel');
    var passwordInput = document.getElementById('password');

    passwordCheckbox.addEventListener('change', function() {
        // Toggle the visibility of the password based on the checkbox state
        passwordInput.type = this.checked ? 'text' : 'password';

        // Update the label text accordingly
        passwordLabel.textContent = this.checked ? 'Hiện mật khẩu' : 'Ẩn mật khẩu';
    });
</script>
@endsection