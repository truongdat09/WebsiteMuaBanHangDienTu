@extends('admin.layout.body')

@section('content')
    <h1>{{ $title }}</h1>

    <a href="{{ route('admin.hanghoa.createPhieuNhap') }}" class="btn btn-primary">Thêm phiếu nhập hàng</a>

    <table class="table">
        <thead>
            <tr>
                <th>Mã phiếu nhập</th>
                <th>Nhà cung cấp</th>
                <th>Ngày nhập</th>
                <th>Tổng nhập</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->MAPN }}</td>
                    <td>{{ $item->TENNCC }}</td>
                    <td>{{ $item->NGAYNHAP }}</td>
                    <td>{{ $item->TONGNHAP }}</td>
                    <td>
                        <a href="{{ route('admin.hanghoa.showChiTietNhapHang', ['mapn' => $item->MAPN]) }}" class="btn btn-info">Xem chi tiết</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
