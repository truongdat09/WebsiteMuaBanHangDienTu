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

        <div class="card card-md-6">
            <div class="card-body">
                <h2 class="h2 text-center mb-4 text-uppercase">Đăng ký</h2>
                <form action="{{ route('auth.postInfo') }}" method="post" id="form">
                    <div class="row m-1 mt-4">
                        <div class="col-md-6">
                            <label class="control-label">Tên tài khoản</label>
                            <input type="text" class="form-control" name="TENNV" value="{{ old('TENNV') }}"
                                required data-parsley-required-message="Trường này không được bỏ trống." minlength="6"
                                data-parsley-minlength-message="Tối thiểu 6 kí tự">
                            @error('TENNV')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="control-label">Số điện thoại</label>
                            <input type="tel" class="form-control" name="SDT" value="{{ old('SDT') }}" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                            @error('SDT')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row m-1 mt-4">
                        <div class="col-md-12">
                            <label class="control-label">giới tính</label>
                            <input type="text" class="form-control" name="GIOITINH" value="{{ old('GIOITINH') }}" required
                                data-parsley-required-message="Trường này không được bỏ trống."
                                >
                            @error('GIOITINH')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row m-1 mt-4">
                        <div class="col-md-12">
                            <label class="control-label">tài khoản</label>
                            <input type="text" class="form-control" name="TAIKHOAN" value="{{ old('TAIKHOAN') }}" required
                                data-parsley-required-message="Trường này không được bỏ trống."
                                >
                            @error('TAIKHOAN')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row m-1 mt-4">
                        <div class="col-md-6">
                            <label class="control-label">Mật khẩu</label>
                            <input type="password" class="form-control" name="MATKHAU" value="{{ old('MATKHAU') }}"
                                required data-parsley-required-message="Trường này không được bỏ trống." minlength="3"
                                id="MATKHAU" data-parsley-minlength-message="Chứa ít nhất 3 kí tự">
                            @error('MATKHAU')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="control-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" required
                                data-parsley-required-message="Trường này không được bỏ trống."
                                data-parsley-equalto="#MATKHAU" data-parsley-equalto-message="Mật khẩu không trùng khớp.">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @csrf

                    <div class="row mx-auto my-3 justify-content-center">
                        <button type="submit" class="btn btn-primary w-25">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
