<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class HomeController extends Controller
{
    public function __construct()
    {
        Cart::instance('default')->content();
    }

    public $pageSize = 6;

    public function gioithieuchungtoi()
    {
        return view('pages.gioi_thieu_chung_toi');
    }

    public function index()
    {
        $loaisanpham = DB::table('loaisanppham')
            ->select('loaisanppham.TENLOAI', 'loaisanppham.MALOAI', DB::raw('COUNT(sanpham.MALOAI) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'loaisanppham.MALOAI', '=', 'sanpham.MALOAI')
            ->groupBy('loaisanppham.TENLOAI', 'loaisanppham.MALOAI') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('loaisanppham.TENLOAI', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();

        $thuonghieu = DB::table('thuonghieu')
            ->select('thuonghieu.TEN_THUONGHIEU', 'thuonghieu.MATUONGHIEU', DB::raw('COUNT(sanpham.MATUONGHIEU) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'thuonghieu.MATUONGHIEU', '=', 'sanpham.MATUONGHIEU')
            ->groupBy('thuonghieu.TEN_THUONGHIEU', 'thuonghieu.MATUONGHIEU') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('thuonghieu.TEN_THUONGHIEU', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();
        $sanpham = DB::table('sanpham')->join('thuonghieu', 'sanpham.MATUONGHIEU', '=', 'thuonghieu.MATUONGHIEU')->orderBy('GIABAN', 'ASC')->get();
        $sanpham2 = DB::table('sanpham')->join('thuonghieu', 'sanpham.MATUONGHIEU', '=', 'thuonghieu.MATUONGHIEU')->orderBy('TENSP', 'DESC')->get();

        return view('pages.home')->with('loaisanpham', $loaisanpham)->with('thuonghieu', $thuonghieu)->with('sanpham', $sanpham)->with('sanpham2', $sanpham2);
    }

    public function san_pham()
    {
        //$loaisanpham = DB::table('loaisanppham')->orderBy('MALOAI', 'ASC')->get();

        $loaisanpham = DB::table('loaisanppham')
            ->select('loaisanppham.TENLOAI', 'loaisanppham.MALOAI', DB::raw('COUNT(sanpham.MALOAI) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'loaisanppham.MALOAI', '=', 'sanpham.MALOAI')
            ->groupBy('loaisanppham.TENLOAI', 'loaisanppham.MALOAI') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('loaisanppham.TENLOAI', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();

        $thuonghieu = DB::table('thuonghieu')
            ->select('thuonghieu.TEN_THUONGHIEU', 'thuonghieu.MATUONGHIEU', DB::raw('COUNT(sanpham.MATUONGHIEU) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'thuonghieu.MATUONGHIEU', '=', 'sanpham.MATUONGHIEU')
            ->groupBy('thuonghieu.TEN_THUONGHIEU', 'thuonghieu.MATUONGHIEU') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('thuonghieu.TEN_THUONGHIEU', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();

        $tatca_sanpham = DB::table('sanpham')->join('thuonghieu', 'sanpham.MATUONGHIEU', '=', 'thuonghieu.MATUONGHIEU')->orderBy('TENSP', 'ASC')->paginate($this->pageSize);

        return view('pages.sanpham')->with('loaisanpham', $loaisanpham)->with('thuonghieu', $thuonghieu)->with('tatca_sanpham', $tatca_sanpham);
    }

    public function tatcathuonghieu()
    {
        $loaisanpham = DB::table('loaisanppham')
            ->select('loaisanppham.TENLOAI', 'loaisanppham.MALOAI', DB::raw('COUNT(sanpham.MALOAI) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'loaisanppham.MALOAI', '=', 'sanpham.MALOAI')
            ->groupBy('loaisanppham.TENLOAI', 'loaisanppham.MALOAI') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('loaisanppham.TENLOAI', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();
        $thuonghieu = DB::table('thuonghieu')
            ->select('thuonghieu.TEN_THUONGHIEU', 'thuonghieu.MATUONGHIEU', DB::raw('COUNT(sanpham.MATUONGHIEU) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'thuonghieu.MATUONGHIEU', '=', 'sanpham.MATUONGHIEU')
            ->groupBy('thuonghieu.TEN_THUONGHIEU', 'thuonghieu.MATUONGHIEU') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('thuonghieu.TEN_THUONGHIEU', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();
        $tatca_sanpham = DB::table('sanpham')->join('thuonghieu', 'sanpham.MATUONGHIEU', '=', 'thuonghieu.MATUONGHIEU')->orderBy('TENSP', 'ASC')->paginate($this->pageSize);
        $tatcathuonghieu = DB::table('thuonghieu')->get();
        return view('pages.sanpham', compact('tatcathuonghieu', 'loaisanpham', 'thuonghieu', 'tatca_sanpham'));
    }

    public function san_pham_theo_loai($MALOAI)
    {
        $loaisanpham = DB::table('loaisanppham')
            ->select('loaisanppham.TENLOAI', 'loaisanppham.MALOAI', DB::raw('COUNT(sanpham.MALOAI) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'loaisanppham.MALOAI', '=', 'sanpham.MALOAI')
            ->groupBy('loaisanppham.TENLOAI', 'loaisanppham.MALOAI') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('loaisanppham.TENLOAI', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();
        $thuonghieu = DB::table('thuonghieu')
            ->select('thuonghieu.TEN_THUONGHIEU', 'thuonghieu.MATUONGHIEU', DB::raw('COUNT(sanpham.MATUONGHIEU) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'thuonghieu.MATUONGHIEU', '=', 'sanpham.MATUONGHIEU')
            ->groupBy('thuonghieu.TEN_THUONGHIEU', 'thuonghieu.MATUONGHIEU') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('thuonghieu.TEN_THUONGHIEU', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();
        $sanpham_theoloai = DB::table('sanpham')->join('thuonghieu', 'sanpham.MATUONGHIEU', '=', 'thuonghieu.MATUONGHIEU')->join('loaisanppham', 'sanpham.MALOAI', '=', 'loaisanppham.MALOAI')->where('sanpham.MALOAI', $MALOAI)->paginate($this->pageSize);
        $tenloaisanpham = DB::table('loaisanppham')->where('loaisanppham.MALOAI', $MALOAI)->get();
        return view('pages.san_pham_theo_loai')
            ->with('loaisanpham', $loaisanpham)
            ->with('thuonghieu', $thuonghieu)
            ->with('sanpham_theoloai', $sanpham_theoloai)
            ->with('tenloaisanpham', $tenloaisanpham);
    }

    public function san_pham_theo_thuong_hieu($MATUONGHIEU)
    {
        $loaisanpham = DB::table('loaisanppham')
            ->select('loaisanppham.TENLOAI', 'loaisanppham.MALOAI', DB::raw('COUNT(sanpham.MALOAI) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'loaisanppham.MALOAI', '=', 'sanpham.MALOAI')
            ->groupBy('loaisanppham.TENLOAI', 'loaisanppham.MALOAI') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('loaisanppham.TENLOAI', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();
        $thuonghieu = DB::table('thuonghieu')
            ->select('thuonghieu.TEN_THUONGHIEU', 'thuonghieu.MATUONGHIEU', DB::raw('COUNT(sanpham.MATUONGHIEU) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'thuonghieu.MATUONGHIEU', '=', 'sanpham.MATUONGHIEU')
            ->groupBy('thuonghieu.TEN_THUONGHIEU', 'thuonghieu.MATUONGHIEU') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('thuonghieu.TEN_THUONGHIEU', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();
        $sanpham_theothuonghieu = DB::table('sanpham')->join('thuonghieu', 'sanpham.MATUONGHIEU', '=', 'thuonghieu.MATUONGHIEU')->join('loaisanppham', 'sanpham.MALOAI', '=', 'loaisanppham.MALOAI')->where('sanpham.MATUONGHIEU', $MATUONGHIEU)->paginate($this->pageSize);
        $tenthuonghieu = DB::table('thuonghieu')->where('thuonghieu.MATUONGHIEU', $MATUONGHIEU)->get();
        return view('pages.san_pham_theo_thuong_hieu')
            ->with('loaisanpham', $loaisanpham)
            ->with('thuonghieu', $thuonghieu)
            ->with('sanpham_theothuonghieu', $sanpham_theothuonghieu)
            ->with('tenthuonghieu', $tenthuonghieu);
    }
    public function chi_tiet_san_pham($MASP)
    {
        $sanpham = DB::table('sanpham')
            ->join('thuonghieu', 'sanpham.MATUONGHIEU', '=', 'thuonghieu.MATUONGHIEU')
            ->join('loaisanppham', 'sanpham.MALOAI', '=', 'loaisanppham.MALOAI')
            ->where('sanpham.MASP', $MASP)->get();

        foreach ($sanpham as $key => $value) {
            $MALOAI = $value->MALOAI;
        }

        $sanpham_tuongtu = DB::table('sanpham')
            ->join('thuonghieu', 'sanpham.MATUONGHIEU', '=', 'thuonghieu.MATUONGHIEU')
            ->join('loaisanppham', 'sanpham.MALOAI', '=', 'loaisanppham.MALOAI')
            ->where('loaisanppham.MALOAI', $MALOAI)->whereNotIn('sanpham.MASP', [$MASP])
            ->paginate($this->pageSize);

        return view('pages.chi_tiet_san_pham')
            ->with('sanpham', $sanpham)
            ->with('sanpham_tuongtu', $sanpham_tuongtu);
    }

    public function giohang(Request $request)
    {
        $MASP = $request->MASP;
        $soluong = $request->qty;
        $sp = DB::table('sanpham')->where('sanpham.MASP', $MASP)->first();
        $data['id'] = $sp->MASP;
        $data['qty'] = $soluong;
        $data['name'] = $sp->TENSP;
        $data['price'] = $sp->GIABAN;
        $data['weight'] = "000";
        $data['options']['image'] = $sp->HINH;
        Cart::add($data);
        Cart::setGlobalTax(0);
        //Cart::destroy();
        return Redirect::to('/show-gio-hang');
        //return view('pages.chi_tiet_san_pham');
    }

    public function giohang2(Request $request)
    {
        $MASP = $request->MASP;
        $soluong = $request->qty;
        $sp = DB::table('sanpham')->where('sanpham.MASP', $MASP)->first();
        $sl_that = DB::table('sanpham')->select('SOLUONG')->where('MASP', $MASP)->first();
        if ($soluong <= $sl_that->SOLUONG) {
            $data['id'] = $sp->MASP;
            $data['qty'] = $soluong;
            $data['name'] = $sp->TENSP;
            $data['price'] = $sp->GIABAN;
            $data['weight'] = "000";
            $data['options']['image'] = $sp->HINH;
            Cart::add($data);
            Cart::setGlobalTax(0);
            //Cart::destroy();

            return Redirect::to('/san-pham');
        } else {

            $soluong = 1;
            $data['id'] = $sp->MASP;
            $data['qty'] = $soluong;
            $data['name'] = $sp->TENSP;
            $data['price'] = $sp->GIABAN;
            $data['weight'] = "000";
            $data['options']['image'] = $sp->HINH;
            Cart::add($data);
            Cart::setGlobalTax(0);
            //Cart::destroy();

            return Redirect::to('/san-pham');
        }
    }
    public function huygiohang()
    {
        Cart::destroy();
        return Redirect::to('/show-gio-hang');
    }

    public function xoa_gio_hang($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/show-gio-hang');
    }

    public function show_giohang()
    {
        return view('pages.gio_hang');
    }

    public function capnhatgiohang(Request $request)
    {
        $rowId = $request->rowId_cart;
        $masp = $request->masp;
        $sluong = $request->qty_cart;
        $tensp = $request->tensp;
        // Lấy giá trị số lượng từ trường SOLUONG của đối tượng
        $sl_that = DB::table('sanpham')->select('SOLUONG')->where('MASP', $masp)->first();

        // Kiểm tra số lượng cập nhật có nhỏ hơn hoặc bằng số lượng hiện tại không
        if ($sluong <= $sl_that->SOLUONG) {
            Cart::update($rowId, $sluong);
            return Redirect::to('/show-gio-hang');
        } else {
            $rowId = $request->rowId_cart;
            $sluong = 1;
            // echo 'Sản phẩm không đủ số lượng theo nhu cầu';
            Session::put('khongdusl', 'không đủ số lượng theo nhu cầu của quý khách.');
            Session::put('tensp', $tensp);
            Cart::update($rowId, $sluong);
            return Redirect::to('/show-gio-hang');
        }
    }


    public function dang_nhap()
    {
        return view('pages.dang_nhap');
    }

    public function dashboard(Request $request)
    {
        $user_email = $request->email;
        //----------md5 là mã hoá password---------//
        //$admin_password = md5($request->admin_password);
        $user_password = $request->password;

        $result = DB::table('khachhang')->where('EMAIL', $user_email)->where('MATKHAU', $user_password)->first();
        if ($result != null) {
            Session::put('user_name', $result->TENKH);
            Session::put('password', $result->MATKHAU);
            Session::put('tenNhanHang', $result->TEN_NHANHANG);
            Session::put('diaChiNhanHang', $result->DIACHI_NHANHANG);
            Session::put('SDTNhanHang', $result->SDT_NHANHANG);
            Session::put('SDT', $result->SDT_KH);
            Session::put('email', $result->EMAIL);
            Session::put('diachi', $result->DIACHI);
            return Redirect::to('/trang-chu');
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu không chính xác.');
            return Redirect::to('/dang-nhap');
        }
    }

    public function user_logout()
    {
        Session::put('user_name', null);
        Session::put('tenNhanHang', null);
        Session::put('diaChiNhanHang', null);
        Session::put('SDTNhanHang', null);
        Session::put('SDT', null);
        Session::put('email', null);
        Cart::destroy();
        return Redirect::to('/trang-chu');
    }

    public function dang_ky()
    {
        return view('pages.dang_ky');
    }

    public function themKhachHang(Request $request)
    {
        $data = array();
        $data['TENKH'] = $request->TEN_KH;
        $data['EMAIL'] = $request->EMAIL;
        $data['MATKHAU'] = $request->MATKHAU;
        $data['SDT_KH'] = $request->SDT_KH;
        $data['DIACHI'] = $request->DIACHI;
        $data['TEN_NHANHANG'] = $request->TEN_KH;
        $data['SDT_NHANHANG'] = $request->SDT_KH;
        $data['DIACHI_NHANHANG'] = $request->DIACHI;

        $SDT_KH = DB::table('khachhang')->insertGetId($data);

        Session::put('SDT_KH', $SDT_KH);
        Session::put('TENKH', $request->TEN_KH);
        Session::put('EMAIL', $request->EMAIL);
        Session::put('DIACHI', $request->DIACHI);
        Session::put('SDT_KH', $request->SDT_KH);

        Session::put('thanhcong', 'Đăng ký tài khoản thành công! Đăng nhập ngay <333.');
        return redirect('/dang-nhap');
    }

    public function thongtintaikhoan($MAKH)
    {
        $khachhang = DB::table('khachhang')
            ->where('khachhang.SDT_KH', $MAKH)->get();
        return view('pages.thong_tin_tai_khoan')->with('khachhang', $khachhang);
    }

    public function theodoidonhang($MAKH)
    {
        $hoadon_khachHang = DB::table('hoadon')
            ->join('chitiet_hd as ct1', 'hoadon.MAHD', '=', 'ct1.MAHD')
            ->join('sanpham', 'ct1.MASP', '=', 'sanpham.MASP')
            ->join('trangthaihoadon', 'hoadon.MATT', '=', 'trangthaihoadon.MATT')
            ->where('hoadon.SDT_KH', $MAKH)
            ->get();
        return view('pages.theo_doi_don_hang')->with('hoadon_khachhang', $hoadon_khachHang);
    }

    public function capnhatthongtin(Request $request)
    {
        $thongtin_capnhat = array();
        $thongtin_capnhat['TENKH'] = $request->TENKH;
        $thongtin_capnhat['EMAIL'] = $request->EMAIL;
        $thongtin_capnhat['MATKHAU'] = $request->MATKHAU;
        $thongtin_capnhat['DIACHI'] = $request->DIACHI;
        $thongtin_capnhat['TEN_NHANHANG'] = $request->TEN_NHANHANG;
        $thongtin_capnhat['DIACHI_NHANHANG'] = $request->DIACHI_NHANHANG;
        $thongtin_capnhat['SDT_NHANHANG'] = $request->SDT_NHANHANG;

        $status = DB::table('khachhang')->where('SDT_KH', $request->SDT_KH)->update($thongtin_capnhat);

        $khachhang = DB::table('khachhang')
            ->where('khachhang.SDT_KH', $request->SDT_KH)->get();

        if ($status) {
            Session::put('success', 'Cập nhật thành công. Vui lòng đăng nhập lại tài khoản!');
            Session::put('user_name', null);
            Session::put('tenNhanHang', null);
            Session::put('diaChiNhanHang', null);
            Session::put('SDTNhanHang', null);
            Session::put('SDT', null);
            Session::put('email', null);
            return view('pages.dang_nhap')->with('khachhang', $khachhang);
        } else {
            Session::put('errol', 'Cập nhật thất bại. Vui lòng thử lại!');
            return view('pages.thong_tin_tai_khoan')->with('khachhang', $khachhang);
        }
    }

    public function timkiemsanpham(Request $request)
    {
        $key = $request->keywords;
        $loaisanpham = DB::table('loaisanppham')
            ->select('loaisanppham.TENLOAI', 'loaisanppham.MALOAI', DB::raw('COUNT(sanpham.MALOAI) AS SoLuongSanPham'))
            ->leftJoin('sanpham', 'loaisanppham.MALOAI', '=', 'sanpham.MALOAI')
            ->groupBy('loaisanppham.TENLOAI', 'loaisanppham.MALOAI') // Thêm 'loaisanppham.TENLOAI' vào danh sách GROUP BY
            ->orderBy('loaisanppham.TENLOAI', 'ASC') // Có thể sử dụng 'loaisanppham.TENLOAI' để sắp xếp
            ->get();
        $thuonghieu = DB::table('thuonghieu')->orderBy('MATUONGHIEU', 'ASC')->get();
        $ket_qua_tim_kiem = DB::table('sanpham')
            ->join('thuonghieu', 'sanpham.MATUONGHIEU', '=', 'thuonghieu.MATUONGHIEU')
            ->join('loaisanppham', 'sanpham.MALOAI', '=', 'loaisanppham.MALOAI')
            ->where(function ($query) use ($key) {
                $query->where('TENSP', 'LIKE', '%' . $key . '%')
                    ->orWhere('GIABAN', 'LIKE', '%' . $key . '%')
                    ->orWhere('TEN_THUONGHIEU', 'LIKE', '%' . $key . '%')
                    ->orWhere('TENLOAI', 'LIKE', '%' . $key . '%');
            })
            ->paginate($this->pageSize);


        return view('pages.tim_kiem_san_pham')->with('loaisanpham', $loaisanpham)->with('thuonghieu', $thuonghieu)
            ->with('ketquatimkiem', $ket_qua_tim_kiem);
    }

    public function chitietdonhang(){
        
    }
}
