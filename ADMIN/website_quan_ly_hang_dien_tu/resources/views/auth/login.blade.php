{{-- @extends('admin.layout.auth_layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container container-tight">
        <div class="text-center mb-3">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('admin/static/logo.svg') }}"
                    height="36" alt=""></a>
        </div>

        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4 text-uppercase">Đăng nhập</h2>
                <form action="{{ route('auth.checkLogin') }}" method="post" id="form">
                    <div class="mb-3">
                        <label class="form-label">Tài khoản</label>

                        <input type="email" class="form-control" placeholder="xxxx@email.com" name="email"
                            value="{{ old('email') }}" required
                            data-parsley-required-message="Trường này không được để trống"
                            data-parsley-type-message="Trường này phải là email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <input type="TAIKHOAN" class="form-control" placeholder="user name" name="TAIKHOAN"
                            value="{{ old('TAIKHOAN') }}" required
                            data-parsley-required-message="Trường này không được để trống"
                            >
                        @error('TAIKHOAN')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Mật khẩu
                            <span class="form-label-description">
                                <a href="#">Quên mật khẩu</a>
                            </span>
                        </label>
                        <input type="MATKHAU" class="form-control" placeholder="Mật khẩu" name="MATKHAU"
                            value="{{ old('MATKHAU') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống">
                        @error('MATKHAU')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input">
                            <span class="form-check-label">Ghi nhớ tôi</span>
                        </label>
                    </div>
                    @csrf
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center text-muted mt-3">
            Bạn chưa có tài khoản? <a href="{{ route('auth.register') }}" tabindex="-1">Đăng ký</a>
        </div>
    </div>
@endsection --}}



@extends('admin.layout.auth_layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container container-tight">
        <div class="text-center mb-3">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('admin/static/logo.svg') }}"
                    height="36" alt=""></a>
        </div>

        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4 text-uppercase">Đăng nhập</h2>
                <form action="{{ route('auth.postLogin') }}" method="post" id="form">
                    <div class="mb-3">
                        <label class="form-label">Tài khoản</label>
                        <input type="text" class="form-control" placeholder="Tên đăng nhập" name="TAIKHOAN"
                            value="{{ old('TAIKHOAN') }}" required
                            data-parsley-required-message="Trường này không được để trống">
                        @error('TAIKHOAN')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Mật khẩu
                            <span class="form-label-description">
                                <a href="#">Quên mật khẩu</a>
                            </span>
                        </label>
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="MATKHAU"
                            value="{{ old('MATKHAU') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống">
                        @error('MATKHAU')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input">
                            <span class="form-check-label">Ghi nhớ tôi</span>
                        </label>
                    </div> --}}
                    @csrf
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center text-muted mt-3">
            Bạn chưa có tài khoản? <a href="{{ route('auth.register') }}" tabindex="-1">Đăng ký</a>
        </div>
    </div>
@endsection
