@extends('admin.layout.body')

@section('content')
    <div class="container">
        <h2>{{ $title }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá nhập</th>
                    <th>Tổng tiền nhập</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->MASP }}</td>
                        <td>{{ $item->TENSP }}</td>
                        <td>{{ $item->SL }}</td>
                        <td>{{ $item->GIANHAP }}</td>
                        <td>{{ $item->TONGTIENNHAP }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Liên kết đến view addchitietphieunhap -->
        <a href="{{ route('admin.hanghoa.showAddChiTietPhieuNhap', ['mapn' => $mapn]) }}">Thêm chi tiết phiếu nhập</a>
    </div>
@endsection
