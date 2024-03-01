@extends('admin.layout.body')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card mx-3">
        <div class="card-body">
            <h2 class="mb-0 text-uppercase text-center">{{ $title }}</h2>

            <div class="filter-options mb-3">
                <form method="get" action="{{ route('admin.hoadon.listByDate') }}" class="form-inline">
                    @csrf
                    <label for="start_date" class="mr-2">Từ ngày:</label>
                    <input type="date" id="start_date" name="start_date" required class="form-control mr-2">

                    <label for="end_date" class="mr-2">Tới ngày:</label>
                    <input type="date" id="end_date" name="end_date" required class="form-control mr-2">

                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>
            </div>

            <div class="status-filter mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_confirmed" value="confirmed">
                    <label class="form-check-label" for="status_confirmed">
                        Đã xác nhận
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_unconfirmed" value="unconfirmed">
                    <label class="form-check-label" for="status_unconfirmed">
                        Chưa xác nhận
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_delivered" value="delivered">
                    <label class="form-check-label" for="status_delivered">
                        Đã giao
                    </label>
                </div>
            </div>

            <form method="post" action="{{ route('admin.hoadon.update') }}" id="updateForm">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã Hóa Đơn</th>
                            <th scope="col">Nhân Viên</th>
                            <th scope="col">Ngày Lập</th>
                            <th scope="col">Tổng Tiền</th>
                            <th scope="col">Hình Thức Thanh Toán</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Khách Hàng</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Email</th>

                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hoadons as $hoadon)
                            <tr>
                                <td>{{ $hoadon->MAHD }}</td>
                                <td>{{ $hoadon->TENNV }}</td>
                                <td>{{ $hoadon->NGAYLAP }}</td>
                                <td>{{ $hoadon->TONGTIEN }}</td>
                                <td>{{ $hoadon->HinhThuc }}</td>
                                <td>{{ $hoadon->TrangThai }}</td>
                                <td>{{ $hoadon->TENKH }}</td>
                                <td>{{ $hoadon->DIACHI }}</td>
                                <td>{{ $hoadon->EMAIL }}</td>

                                <td colspan="9">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tên Sản Phẩm</th>
                                                <th scope="col">Số Lượng</th>
                                                <th scope="col">Giá Bán</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hoadon->chitiet as $chitiet)
                                                <tr>
                                                    <td>{{ $chitiet->TENSP }}</td>
                                                    <td>{{ $chitiet->SL }}</td>
                                                    <td>{{ $chitiet->GIABAN }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script>

        // Get radio buttons and add event listener
        var radioButtons = document.querySelectorAll('input[name="status"]');

        radioButtons.forEach(function (radioButton) {
            radioButton.addEventListener("change", function () {
                // Get the selected value
                var selectedStatus = document.querySelector('input[name="status"]:checked').value;

                // Navigate based on the selected status
                switch (selectedStatus) {
                    case "confirmed":
                        window.location.href = "{{ route('admin.hoadon.submit') }}";
                        break;
                    case "unconfirmed":
                        window.location.href = "{{ route('admin.hoadon.index') }}";
                        break;
                    case "delivered":
                        window.location.href = "{{ route('admin.hoadon.dagiao') }}";
                        break;
                    default:
                        break;
                }
            });
        });
    </script>
@endsection
