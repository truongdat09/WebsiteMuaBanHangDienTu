@extends('admin.layout.body')

@section('content')
    <h1>{{ $title }}</h1>

    <form action="{{ route('admin.hanghoa.storePhieuNhap') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="MAPN">Mã phiếu nhập</label>
            <input type="text" class="form-control" id="MAPN" name="MAPN" required>
        </div>
        <div class="form-group">
            <label for="MANCC">Nhà cung cấp</label>
            <select class="form-control" id="MANCC" name="MANCC" required>
                @foreach ($nhaCungCap as $item)
                    <option value="{{ $item->MANCC }}">{{ $item->TENNCC }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm phiếu nhập hàng</button>
    </form>
@endsection
