{{-- @extends('admin.layout.body')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card mx-3">
        <div class="card-body">
            <h2 class="mb-0 text-uppercase text-center">Thông tin admin</h2>

            <form action="{{ route('admin.user.postAdd') }}" method="post">
                <div class="row m-1 mt-4">
                    <div class="col-md-6">
                        <label class="control-label">Họ và tên</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống." minlength="6"
                            data-parsley-minlength-message="Tối thiểu 6 kí tự">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Số điện thoại</label>
                        <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống.">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row m-1 mt-4">
                    <div class="col-md-12">
                        <label class="control-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống."
                            data-parsley-type-message="Email không hợp lệ.">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row m-1 mt-4">
                    <div class="col-md-6">
                        <label class="control-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống." minlength="3" id="password"
                            data-parsley-minlength-message="Chứa ít nhất 3 kí tự">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống." data-parsley-equalto="#password"
                            data-parsley-equalto-message="Mật khẩu không trùng khớp.">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @csrf

                <div class="row mx-auto my-3 justify-content-center">
                    <button type="submit" class="btn btn-primary w-25">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection --}}


@extends('admin.layout.body')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card mx-3">
        <div class="card-body">
            <h2 class="mb-0 text-uppercase text-center">Thông tin admin</h2>

            <form action="{{ route('admin.nhanvien.store') }}" method="post">
                <div class="row m-1 mt-4">
                    <div class="col-md-6">
                        <label class="control-label">Mã nhân viên</label>
                        <input type="text" class="form-control" name="MANV" value="{{ old('MANV') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống." minlength="2"
                            data-parsley-minlength-message="Tối thiểu 2 kí tự">
                        @error('MANV')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Họ và tên</label>
                        <input type="text" class="form-control" name="TENNV" value="{{ old('TENNV') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống." minlength="6"
                            data-parsley-minlength-message="Tối thiểu 6 kí tự">
                        @error('TENNV')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Giới tính</label>
                        <input type="tel" class="form-control" name="GIOITINH" value="{{ old('GIOITINH') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống.">
                        @error('GIOITINH')
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
                        <label class="control-label">Tài khoản</label>
                        <input type="text" class="form-control" name="TAIKHOAN" value="{{ old('TAIKHOAN') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống."
                            data-parsley-type-message="Email không hợp lệ.">
                        @error('TAIKHOAN')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row m-1 mt-4">
                    <div class="col-md-12">
                        <label class="control-label">Loại nhân viên</label>
                        <input type="text" class="form-control" name="LoaiNhanVien" value="{{ old('LoaiNhanVien') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống."
                            data-parsley-type-message="Email không hợp lệ.">
                        @error('LoaiNhanVien')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row m-1 mt-4">
                    <div class="col-md-6">
                        <label class="control-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="MATKHAU" value="{{ old('MATKHAU') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống." minlength="3" id="password"
                            data-parsley-minlength-message="Chứa ít nhất 3 kí tự">
                        @error('MATKHAU')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" required
                            data-parsley-required-message="Trường này không được bỏ trống." data-parsley-equalto="#password"
                            data-parsley-equalto-message="Mật khẩu không trùng khớp.">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @csrf

                <div class="row mx-auto my-3 justify-content-center">
                    <button type="submit" class="btn btn-primary w-25">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
