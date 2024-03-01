@extends('admin.layout.body')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <h2>{{ $title }}</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="post" action="{{ route('admin.hanghoa.postEdit') }}">
            @csrf
            @method('PUT') 
            <input type="hidden" name="MASP" value="{{ $sanPham->MASP }}">

            <div class="form-group">
                <label for="MALOAI">Mã loại:</label>
                <select name="MALOAI" class="form-control">
                    @foreach($loaisanpham as $loai)
                        <option value="{{ $loai->MALOAI }}" {{ $loai->MALOAI == $sanPham->MALOAI ? 'selected' : '' }}>
                            {{ $loai->TENLOAI }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="TENSP">Tên sản phẩm:</label>
                <input type="text" name="TENSP" class="form-control" value="{{ $sanPham->TENSP }}">
            </div>

            <div class="form-group">
                <label for="MOTA">Mô tả:</label>
                <textarea name="MOTA" class="form-control">{{ $sanPham->MOTA }}</textarea>
            </div>

            <div class="form-group">
                <label for="HINH">Hình ảnh:</label>
                <input type="text" name="HINH" class="form-control" value="{{ $sanPham->HINH }}">
            </div>

            <div class="form-group">
                <label for="SOLUONG">Số lượng:</label>
                <input type="number" name="SOLUONG" class="form-control" value="{{ $sanPham->SOLUONG }}">
            </div>

            <div class="form-group">
                <label for="GIABAN">Giá bán:</label>
                <input type="text" name="GIABAN" class="form-control" value="{{ $sanPham->GIABAN }}">
            </div>

            <div class="form-group">
                <label for="MATUONGHIEU">Mã thương hiệu:</label>
                <input type="text" name="MATUONGHIEU" class="form-control" value="{{ $sanPham->MATUONGHIEU }}">
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
