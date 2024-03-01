@extends('admin.layout.body')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card mx-3">
        <div class="card-body">
            <h2 class="mb-0 text-uppercase text-center">Xóa sản phẩm</h2>

            <form action="{{ route('admin.hanghoa.delete', ['id' => $sanPham->MASP]) }}" method="post">
                @csrf
                @method('DELETE')

                <p>Bạn có chắc chắn muốn xóa sản phẩm "{{ $sanPham->TENSP }}"?</p>

                <div class="row mx-auto my-3 justify-content-center">
                    <button type="submit" class="btn btn-danger w-25">Xóa</button>
                    <a href="{{ route('admin.hanghoa.index') }}" class="btn btn-secondary w-25">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
@endsection
