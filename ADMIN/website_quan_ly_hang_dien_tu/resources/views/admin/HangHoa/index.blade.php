@extends('admin.layout.body')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card mx-3">
        <div class="card-body">
            <h2 class="mb-0 text-uppercase text-center">Danh sách sản phẩm</h2>

            @if (count($data) > 0)
                <table class="table table-bordered" id="sanPhamTable">
                    <thead>
                        <tr>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Hình</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá bán</th>
                            <th scope="col">Mã thương hiệu</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $sanPham)
                            <tr>
                                <td>{{ $sanPham->MASP }}</td>
                                <td>{{ $sanPham->TENSP }}</td>
                                <td>{{ $sanPham->MOTA }}</td>
                                <td>{{ $sanPham->HINH }}</td>
                                <td>{{ $sanPham->SOLUONG }}</td>
                                <td>{{ $sanPham->GIABAN }}</td>
                                <td>{{ $sanPham->MATUONGHIEU }}</td>
                                <td>
                                    <a href="{{ route('admin.hanghoa.edit', ['id' => $sanPham->MASP]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <form action="{{ route('admin.hanghoa.delete', ['id' => $sanPham->MASP]) }}" method="post" style="display: inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">Không có dữ liệu.</p>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            // Khởi tạo DataTable với các tùy chọn
            $(document).ready(function() {
                $('#sanPhamTable').DataTable();
            });
        </script>
    @endpush
@endsection
