@extends('admin.layout.body')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card mx-3">
        <div class="card-body">
            <h2 class="mb-0 text-uppercase text-center">Thêm sản phẩm</h2>

            <form action="{{ route('admin.hanghoa.postAdd') }}" method="post">
                @csrf

                <div class="row m-1 mt-4">
                    <div class="col-md-6">
                        <label class="control-label">Mã sản phẩm</label>
                        <input type="text" class="form-control" name="MASP" value="{{ old('MASP') }}" required>
                        @error('MASP')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Mã loại</label>
                        <select class="form-control" name="MALOAI" required>
                            @foreach ($loaisanpham as $loai)
                                <option value="{{ $loai->MALOAI }}">{{ $loai->TENLOAI }}</option>
                            @endforeach
                        </select>
                        @error('MALOAI')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="TENSP" value="{{ old('TENSP') }}" required>
                        @error('TENSP')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row m-1 mt-4">
                    <div class="col-md-12">
                        <label class="control-label">Mô tả</label>
                        <textarea class="form-control" name="MOTA">{{ old('MOTA') }}</textarea>
                        @error('MOTA')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row m-1 mt-4">
                    <div class="col-md-6">
                        <label class="control-label">Hình</label>
                        <input type="text" class="form-control" name="HINH" value="{{ old('HINH') }}">
                        @error('HINH')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Số lượng</label>
                        <input type="text" class="form-control" name="SOLUONG" value="{{ old('SOLUONG') }}">
                        @error('SOLUONG')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row m-1 mt-4">
                    <div class="col-md-6">
                        <label class="control-label">Giá bán</label>
                        <input type="text" class="form-control" name="GIABAN" value="{{ old('GIABAN') }}">
                        @error('GIABAN')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Mã thương hiệu</label>
                        <select class="form-control" name="MATUONGHIEU">
                            @foreach ($thuonghieu as $thuongHieu)
                                <option value="{{ $thuongHieu->MATUONGHIEU }}">{{ $thuongHieu->TEN_THUONGHIEU }}</option>
                            @endforeach
                        </select>
                        @error('MATUONGHIEU')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mx-auto my-3 justify-content-center">
                    <button type="submit" class="btn btn-primary w-25">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
