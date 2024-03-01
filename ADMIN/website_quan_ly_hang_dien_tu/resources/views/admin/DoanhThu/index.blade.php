@extends('admin.layout.body')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <h1>Thống kê doanh thu theo ngày</h1>
        <canvas id="doanhThuNgayChart" width="400" height="200"></canvas>

        <h1>Thống kê doanh thu theo tháng</h1>
        <canvas id="doanhThuChart" width="400" height="200"></canvas>

        <h1>Sản phẩm bán chạy</h1>
        <canvas id="sanPhamChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Lấy dữ liệu từ controller và gán vào biến JavaScript
        var doanhThuData = {!! $doanhThuTheoThang->content() !!}.result;
        var sanPhamData = {!! $sanPham->content() !!}.result;
        var doanhThuNgayData = {!! $doanhThuTheoNgay->content() !!}.result;

        // Thiết lập đồ thị doanh thu theo ngày
        var doanhThuNgayLabels = doanhThuNgayData.map(item => item.ngay);
        var doanhThuNgayValues = doanhThuNgayData.map(item => item.doanh_thu);

        var doanhThuNgayChartCanvas = document.getElementById('doanhThuNgayChart').getContext('2d');
        var doanhThuNgayChart = new Chart(doanhThuNgayChartCanvas, {
            type: 'bar',
            data: {
                labels: doanhThuNgayLabels,
                datasets: [{
                    label: 'Doanh thu (VND)',
                    data: doanhThuNgayValues,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Thiết lập đồ thị doanh thu theo tháng
        var doanhThuLabels = doanhThuData.map(item => item.thang);
        var doanhThuValues = doanhThuData.map(item => item.doanh_thu);

        var doanhThuChartCanvas = document.getElementById('doanhThuChart').getContext('2d');
        var doanhThuChart = new Chart(doanhThuChartCanvas, {
            type: 'bar',
            data: {
                labels: doanhThuLabels,
                datasets: [{
                    label: 'Doanh thu (VND)',
                    data: doanhThuValues,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Thiết lập đồ thị sản phẩm bán chạy
        var sanPhamLabels = sanPhamData.map(item => item.TENSP);
        var sanPhamValues = sanPhamData.map(item => item.so_luong_ban);

        var sanPhamChartCanvas = document.getElementById('sanPhamChart').getContext('2d');
        var sanPhamChart = new Chart(sanPhamChartCanvas, {
            type: 'bar',
            data: {
                labels: sanPhamLabels,
                datasets: [{
                    label: 'Số lượng bán',
                    data: sanPhamValues,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
@endsection
