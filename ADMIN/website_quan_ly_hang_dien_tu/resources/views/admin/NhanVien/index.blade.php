{{-- @extends('admin.layout.body');

@section('title')
    {{ $title }}
@endsection

@section('content')
    <h2 class="text-uppercase text-center">Danh sách admin</h2>
    {{ $dataTable->table(['class' => 'table table-bordered', 'style' => 'min-width: 900px;'], true) }}
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush --}}


@extends('admin.layout.body')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card mx-3">
        <div class="card-body">
            <h2 class="mb-0 text-uppercase text-center">Danh sách admin</h2>
            
            @if (count($data) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">tên tài khoản</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Loại nhân viên</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->TENNV }}</td>
                                <td>{{ $user->SDT }}</td>
                                <td>{{ $user->TAIKHOAN }}</td>
                                <td>{{ $user->GIOITINH }}</td>
                                <td>{{ $user->LoaiNhanVien }}</td>
                                <td>
                                    <a href="{{ route('admin.nhanvien.edit', ['id' => $user->MANV]) }}" class="btn btn-primary btn-sm">Sửa</a>
                                    <a href="{{ route('admin.nhanvien.destroy', ['id' => $user->MANV]) }}" class="btn btn-danger btn-sm">Xóa</a>
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
@endsection
