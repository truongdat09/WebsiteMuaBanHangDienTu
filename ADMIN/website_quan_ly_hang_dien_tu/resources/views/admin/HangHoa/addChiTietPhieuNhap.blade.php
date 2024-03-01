@extends('admin.layout.body')

@section('content')
    <div class="container">
        <h2>{{ $title }}</h2>
        <form action="{{ route('admin.hanghoa.addChiTietPhieuNhap', ['mapn' => $mapn]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="MASP">Chọn sản phẩm:</label>
                <select class="form-control" id="MASP" name="MASP" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->MASP }}">{{ $product->TENSP }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="SL">Số lượng:</label>
                <input type="number" class="form-control" id="SL" name="SL" required>
            </div>
            <div class="form-group">
                <label for="GIANHAP">Giá nhập:</label>
                <input type="number" class="form-control" id="GIANHAP" name="GIANHAP" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm chi tiết phiếu nhập</button>
        </form>
    </div>
@endsection
