<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\ThanhToanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Front-end -  User
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu',[HomeController::class, 'index']);
Route::get('/san-pham',[HomeController::class, 'san_pham']);
Route::get('/san-pham-theo-loai/{MALOAI}',[HomeController::class, 'san_pham_theo_loai']);
Route::get('/san-pham-theo-thuong-hieu/{MATUONGHIEU}',[HomeController::class, 'san_pham_theo_thuong_hieu']);
Route::get('/chi-tiet-san-pham/{MASP}',[HomeController::class, 'chi_tiet_san_pham']);
Route::post('/gio-hang',[HomeController::class, 'giohang']);
Route::post('/gio-hang2',[HomeController::class, 'giohang2']);
Route::get('/show-gio-hang',[HomeController::class, 'show_giohang']);
Route::get('/huy-gio-hang',[HomeController::class, 'huygiohang']);
Route::get('/xoa-gio-hang/{rowId}',[HomeController::class, 'xoa_gio_hang']);
Route::post('/cap-nhat-gio-hang',[HomeController::class, 'capnhatgiohang']);
Route::get('/dang-nhap',[HomeController::class, 'dang_nhap']);
Route::post('/user-dashboard',[HomeController::class, 'dashboard']);
Route::get('/user-logout',[HomeController::class, 'user_logout']);
Route::get('/tat-ca-thuong-hieu',[HomeController::class,'tatcathuonghieu']);
Route::get('/dang-ky-tai-khoan',[HomeController::class,'dang_ky']);
Route::post('/them-khach-hang',[HomeController::class,'themKhachHang']);
Route::get('/thong-tin-tai-khoan/{MAKH}',[HomeController::class,'thongtintaikhoan']);
Route::get('/theo-doi-don-hang/{MAKH}',[HomeController::class,'theodoidonhang']);
Route::post('/cap-nhat-thong-tin',[HomeController::class,'capnhatthongtin']);
Route::post('/tim-kiem-san-pham',[HomeController::class,'timkiemsanpham']);
Route::get('/gioi-thieu-chung-toi',[HomeController::class,'gioithieuchungtoi']);
Route::get('/chi-tiet-don-hang',[HomeController::class,'chitietdonhang']);
//Route::get('/change-page-size/{size}', [HomeController::class, 'changePageSize'])->name('changePageSize');
//Thanh toán đơn hàng
Route::post('/thanh-toan-vnpay',[ThanhToanController::class,'thanhtoanvnpay']);
Route::post('/thanh-toan-momo',[ThanhToanController::class,'thanhtoanmomo']);
Route::get('/thong-tin-thanh-toan',[ThanhToanController::class,'thongtinthanhtoan']);
Route::get('/thanh-toan',[ThanhToanController::class,'thanh_toan']);
Route::post('/thanh-toan-don-hang',[ThanhToanController::class,'thanhtoandonhang']);
Route::get('/dat-hang',[ThanhToanController::class,'dat_hang']);
Route::get('/dat-hang-khi-nhan-hang',[ThanhToanController::class,'dat_hang_khi_nhan_hang']);
Route::get('/giao-dich-khong-hop-le',[ThanhToanController::class,'giaodichkhonghople']);
//Back-end - Admin
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/dashboard',[AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard',[AdminController::class, 'dashboard']);
Route::get('/logout',[AdminController::class, 'logout']);

//Quản lý danh mục sản phẩm
Route::get('/add-danhmuc-sanpham',[LoaiSanPhamController::class, 'add_danhmuc_sanpham']);
Route::get('/all-danhmuc-sanpham',[LoaiSanPhamController::class, 'all_danhmuc_sanpham']);

