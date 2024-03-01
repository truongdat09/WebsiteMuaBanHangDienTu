<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class DoanhThuController extends Controller
{

    public function doanhThuTheoThang()
    {
        // Thống kê doanh thu theo tháng
        $result = DB::table('hoadon')
            ->select(DB::raw('MONTH(NGAYLAP) as thang'), DB::raw('SUM(TONGTIEN) as doanh_thu'))
            ->groupBy(DB::raw('MONTH(NGAYLAP)'))
            ->get();

        return response()->json(['result' => $result]);
    }

    public function sanPhamBanChay()
    {
        // Thống kê sản phẩm bán chạy
        $result = DB::table('chitiet_hd')
            ->join('sanpham', 'chitiet_hd.MASP', '=', 'sanpham.MASP')
            ->select('chitiet_hd.MASP', 'sanpham.TENSP', DB::raw('SUM(chitiet_hd.SL) as so_luong_ban'))
            ->groupBy('chitiet_hd.MASP', 'sanpham.TENSP')
            ->orderByDesc('so_luong_ban')
            ->limit(5) // Lấy 5 sản phẩm bán chạy nhất
            ->get();

        return response()->json(['result' => $result]);
    }

    public function doanhThuTheoNgay()
    {
        // Thống kê doanh thu theo ngày
        $result = DB::table('hoadon')
            ->select(DB::raw('DATE(NGAYLAP) as ngay'), DB::raw('SUM(TONGTIEN) as doanh_thu'))
            ->groupBy(DB::raw('DATE(NGAYLAP)'))
            ->get();
    
        return response()->json(['result' => $result]);
    }
    

    public function index()
    {
        $title = 'Danh Sách Doanh Thu';
        $doanhThuTheoNgay = $this->doanhThuTheoNgay();
        $doanhThuTheoThang = $this->doanhThuTheoThang();
        $sanPham = $this->sanPhamBanChay();

        return view('admin.doanhthu.index', compact('doanhThuTheoNgay', 'doanhThuTheoThang', 'sanPham', 'title'));
    }

}
