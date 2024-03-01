<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HoaDonController extends Controller
{
    // public function index()
    // {
    //     $title = 'Danh sách hóa đơn';

    //     $hoadons = DB::table('hoadon')
    //         ->join('nhan_viens', 'hoadon.MANV', '=', 'nhan_viens.MANV')
    //         ->join('hinhthucthanhtoan', 'hoadon.MaHT', '=', 'hinhthucthanhtoan.MaHT')
    //         ->join('trangthaihoadon', 'hoadon.MaTT', '=', 'trangthaihoadon.MaTT')
    //         ->join('khachhang', 'hoadon.SDT_KH', '=', 'khachhang.SDT_KH')
    //         ->select(
    //             'hoadon.*',
    //             'nhan_viens.TENNV',
    //             'hinhthucthanhtoan.HinhThuc',
    //             'trangthaihoadon.TrangThai',
    //             'khachhang.TENKH',
    //             'khachhang.DIACHI',
    //             'khachhang.EMAIL'
    //         )
    //         ->where('trangthaihoadon.TrangThai', '=', 'Đang chờ xử lý')
    //         ->get();

    //         $trangthaiList = DB::table('trangthaihoadon')
    //         ->where('TrangThai', '=', 'Đang chờ xử lý')
    //         ->orWhere('TrangThai', '=', 'Đã xác nhận')
    //         ->orWhere('TrangThai', '=', 'Đã giao')
    //         ->get();
        

    //     return view('admin.hoadon.index', compact('title', 'hoadons', 'trangthaiList'));
    // }

    public function index()
    {
        $title = 'Danh sách hóa đơn';

        $hoadons = DB::table('hoadon')
            ->join('nhan_viens', 'hoadon.MANV', '=', 'nhan_viens.MANV')
            ->join('hinhthucthanhtoan', 'hoadon.MaHT', '=', 'hinhthucthanhtoan.MaHT')
            ->join('trangthaihoadon', 'hoadon.MaTT', '=', 'trangthaihoadon.MaTT')
            ->join('khachhang', 'hoadon.SDT_KH', '=', 'khachhang.SDT_KH')
            ->select(
                'hoadon.*',
                'nhan_viens.TENNV',
                'hinhthucthanhtoan.HinhThuc',
                'trangthaihoadon.TrangThai',
                'khachhang.TENKH',
                'khachhang.DIACHI',
                'khachhang.EMAIL'
            )
            ->where('trangthaihoadon.TrangThai', '=', 'Đang chờ xử lý')
            ->get();

        foreach ($hoadons as $hoadon) {
            $hoadon->chitiet = DB::table('chitiet_hd')
                ->join('sanpham', 'chitiet_hd.MASP', '=', 'sanpham.MASP')
                ->where('MAHD', '=', $hoadon->MAHD)
                ->select('sanpham.*', 'chitiet_hd.SL', 'chitiet_hd.GIABAN')
                ->get();
        }

        $trangthaiList = DB::table('trangthaihoadon')
            ->where('TrangThai', '=', 'Đang chờ xử lý')
            ->orWhere('TrangThai', '=', 'Đã xác nhận')
            ->orWhere('TrangThai', '=', 'Đã giao')
            ->get();

        return view('admin.hoadon.index', compact('title', 'hoadons', 'trangthaiList'));
    }

    public function submit()
    {
        $title = 'Danh sách hóa đơn';

        $hoadons = DB::table('hoadon')
            ->join('nhan_viens', 'hoadon.MANV', '=', 'nhan_viens.MANV')
            ->join('hinhthucthanhtoan', 'hoadon.MaHT', '=', 'hinhthucthanhtoan.MaHT')
            ->join('trangthaihoadon', 'hoadon.MaTT', '=', 'trangthaihoadon.MaTT')
            ->join('khachhang', 'hoadon.SDT_KH', '=', 'khachhang.SDT_KH')
            ->select(
                'hoadon.*',
                'nhan_viens.TENNV',
                'hinhthucthanhtoan.HinhThuc',
                'trangthaihoadon.TrangThai',
                'khachhang.TENKH',
                'khachhang.DIACHI',
                'khachhang.EMAIL'
            )
            ->where('trangthaihoadon.TrangThai', '=', 'Đã xác nhận')
            ->get();

        foreach ($hoadons as $hoadon) {
            $hoadon->chitiet = DB::table('chitiet_hd')
                ->join('sanpham', 'chitiet_hd.MASP', '=', 'sanpham.MASP')
                ->where('MAHD', '=', $hoadon->MAHD)
                ->select('sanpham.*', 'chitiet_hd.SL', 'chitiet_hd.GIABAN')
                ->get();
        }

        return view('admin.hoadon.submit', compact('title', 'hoadons'));
    }

    public function pass()
    {
        $title = 'Danh sách hóa đơn';

        $hoadons = DB::table('hoadon')
            ->join('nhan_viens', 'hoadon.MANV', '=', 'nhan_viens.MANV')
            ->join('hinhthucthanhtoan', 'hoadon.MaHT', '=', 'hinhthucthanhtoan.MaHT')
            ->join('trangthaihoadon', 'hoadon.MaTT', '=', 'trangthaihoadon.MaTT')
            ->join('khachhang', 'hoadon.SDT_KH', '=', 'khachhang.SDT_KH')
            ->select(
                'hoadon.*',
                'nhan_viens.TENNV',
                'hinhthucthanhtoan.HinhThuc',
                'trangthaihoadon.TrangThai',
                'khachhang.TENKH',
                'khachhang.DIACHI',
                'khachhang.EMAIL'
            )
            ->where('trangthaihoadon.TrangThai', '=', 'Đã giao')
            ->get();

        foreach ($hoadons as $hoadon) {
            $hoadon->chitiet = DB::table('chitiet_hd')
                ->join('sanpham', 'chitiet_hd.MASP', '=', 'sanpham.MASP')
                ->where('MAHD', '=', $hoadon->MAHD)
                ->select('sanpham.*', 'chitiet_hd.SL', 'chitiet_hd.GIABAN')
                ->get();
        }

        return view('admin.hoadon.submit', compact('title', 'hoadons'));
    }


    public function edit($id)
    {
        if (!empty($id)) {
            $title = 'Cập nhật hóa đơn';
            $user = DB::table('hoadon')->where('MAHD', $id)->first();

            if (!empty($user)) {
                return view('admin.hoadon.update', compact('title', 'user'));
            }
        }

        return redirect()->route('admin.hoadon.index')->with('error', 'Admin không tồn tại.');
    }

    // public function update(Request $request)
    // {
    //     $MAHDs = $request->input('MAHD');
    //     $TrangThais = $request->input('TrangThai');

    //     // Lặp qua từng hóa đơn và cập nhật trạng thái
    //     foreach ($MAHDs as $key => $MAHD) {
    //         $data = [
    //             'MaTT' => $TrangThais[$key],
    //         ];

    //         $status = DB::table('hoadon')->where('MAHD', $MAHD)->update($data);
    //     }

    //     if ($status) {
    //         return redirect()->route('admin.hoadon.index')->with('success', 'Cập nhật thành công.');
    //     }

    //     return back()->with('error', 'Cập nhật thất bại.');
    // }

    public function update(Request $request)
    {
        $MAHDs = $request->input('MAHD');
        $TrangThais = $request->input('TrangThai');

        // Lặp qua từng hóa đơn và cập nhật trạng thái
        foreach ($MAHDs as $key => $MAHD) {
            $data = [
                'MaTT' => $TrangThais[$key],
            ];

            // Cập nhật trạng thái hóa đơn
            $status = DB::table('hoadon')->where('MAHD', $MAHD)->update($data);

            // Nếu cập nhật trạng thái thành công, thực hiện cập nhật số lượng trong bảng sanpham
            if ($status) {
                // Lấy thông tin chi tiết hóa đơn tương ứng
                $chitietHD = DB::table('chitiet_hd')->where('MAHD', $MAHD)->get();

                // Lặp qua từng chi tiết hóa đơn và cập nhật số lượng trong bảng sanpham
                foreach ($chitietHD as $chitiet) {
                    $masp = $chitiet->MASP;
                    $soluong = $chitiet->SL;

                    // Cập nhật số lượng trong bảng sanpham
                    DB::table('sanpham')->where('MASP', $masp)->decrement('SOLUONG', $soluong);
                }
            }
        }

        if ($status) {
            return redirect()->route('admin.hoadon.index')->with('success', 'Cập nhật thành công.');
        }

        return back()->with('error', 'Cập nhật thành công.');
    }


    public function listByDate(Request $request)
    {
        $title = 'Danh sách hóa đơn';

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Validate the date range or handle invalid dates as needed
        if (empty($startDate) || empty($endDate)) {
            return back()->with('error', 'Invalid date range.');
        }

        // Convert string dates to Carbon instances
        $startDateTime = Carbon::parse($startDate)->startOfDay();
        $endDateTime = Carbon::parse($endDate)->endOfDay();

        $hoadons = DB::table('hoadon')
            ->join('nhan_viens', 'hoadon.MANV', '=', 'nhan_viens.MANV')
            ->join('hinhthucthanhtoan', 'hoadon.MaHT', '=', 'hinhthucthanhtoan.MaHT')
            ->join('trangthaihoadon', 'hoadon.MaTT', '=', 'trangthaihoadon.MaTT')
            ->join('khachhang', 'hoadon.SDT_KH', '=', 'khachhang.SDT_KH')
            ->select(
                'hoadon.*',
                'nhan_viens.TENNV',
                'hinhthucthanhtoan.HinhThuc',
                'trangthaihoadon.TrangThai',
                'khachhang.TENKH',
                'khachhang.DIACHI',
                'khachhang.EMAIL'
            )
            ->whereBetween('hoadon.NGAYLAP', [$startDateTime, $endDateTime])
            ->get();

        $trangthaiList = DB::table('trangthaihoadon')
            ->where('TrangThai', '=', 'Đang chờ xử lý')
            ->orWhere('TrangThai', '=', 'đã xác nhận')
            ->get();

        return view('admin.hoadon.index', compact('title', 'hoadons', 'trangthaiList'));
    }


    
}
