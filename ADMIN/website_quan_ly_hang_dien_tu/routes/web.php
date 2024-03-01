<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\HangHoaController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\HoaDonController;
use App\Http\Controllers\Admin\DoanhThuController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::prefix('Auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/checkLogin', [AuthController::class, 'checkLogin'])->name('checkLogin');

    Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/postInfo', [AuthController::class, 'postInfo'])->name('postInfo');
});

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Route::prefix('Admin')->name('admin.')->middleware('author.login')->group(function () {
    Route::prefix('Category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');

        Route::get('/add', [CategoryController::class, 'create'])->name('add');

        Route::post('/add', [CategoryController::class, 'store'])->name('postAdd');

        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');

        Route::post('/update', [CategoryController::class, 'update'])->name('postEdit');

        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
    });

    Route::prefix('HangHoa')->name('hanghoa.')->group(function () {
        Route::get('/', [HangHoaController::class, 'index'])->name('index');

        Route::get('/add', [HangHoaController::class, 'create'])->name('add');

        Route::post('/add', [HangHoaController::class, 'store'])->name('postAdd');

        Route::get('/edit/{id}', [HangHoaController::class, 'edit'])->name('edit');

        Route::put('/update', [HangHoaController::class, 'update'])->name('postEdit');

        Route::delete('/delete/{id}', [HangHoaController::class, 'destroy'])->name('delete');

         // Thêm các route cho quản lý phiếu nhập hàng
        Route::get('/nhaphang', [HangHoaController::class, 'showNhapHang'])->name('showNhapHang');
        Route::get('/nhaphang/create', [HangHoaController::class, 'createPhieuNhap'])->name('createPhieuNhap');
        Route::post('/nhaphang/store', [HangHoaController::class, 'storePhieuNhap'])->name('storePhieuNhap');
        Route::get('/nhaphang/chitietnhap/{mapn}', [HangHoaController::class, 'showChiTietNhapHang'])->name('showChiTietNhapHang');
        Route::get('/nhaphang/addchitietphieunhap/{mapn}', [HangHoaController::class, 'showAddChiTietPhieuNhap'])->name('showAddChiTietPhieuNhap');
        Route::post('/nhaphang/addchitietphieunhap/{mapn}', [HangHoaController::class, 'addChiTietPhieuNhap'])->name('addChiTietPhieuNhap');
    });

    Route::prefix('HoaDon')->name('hoadon.')->group(function () {
        Route::get('/', [HoaDonController::class, 'index'])->name('index');
        Route::get('/hoadon/submit', [HoaDonController::class, 'submit'])->name('submit');
        Route::get('/hoadon/dagiao', [HoaDonController::class, 'pass'])->name('dagiao');
        Route::post('/hoadon/update', [HoaDonController::class, 'update'])->name('update');
        Route::get('/admin/hoadon/list-by-date', [HoaDonController::class, 'listByDate'])->name('listByDate');
    });

    Route::prefix('DoanhThu')->name('doanhthu.')->group(function () {
        Route::get('/', [DoanhThuController::class, 'index'])->name('index');

        Route::get('/admin/doanh-thu/ngay', [DoanhThuController::class, 'doanhThuTheoThang'])->name('doanh-thu.ngay');
        Route::get('/admin/doanh-thu/thang', [DoanhThuController::class, 'doanhThuTheoThang'])->name('doanh-thu.thang');
        Route::get('/admin/doanh-thu/nam', [DoanhThuController::class, 'doanhThuTheoThang'])->name('doanh-thu.nam');

        Route::get('/thongke/doanhthu', [DoanhThuController::class, 'doanhThuTheoThang'])->name('doanhthu');
        Route::get('/thongke/sanphambanchay', [DoanhThuController::class, 'sanPhamBanChay'])->name('sanphambanchay');
    });

    Route::prefix('User')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('/add', [UserController::class, 'create'])->name('add');

        Route::post('/add', [UserController::class, 'store'])->name('postAdd');

        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');

        Route::post('/update', [UserController::class, 'update'])->name('postEdit');

        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    });

    Route::prefix('NhanVien')->name('nhanvien.')->group(function () {
        Route::get('/', [StaffController::class, 'index'])->name('index');

        Route::get('/add', [StaffController::class, 'create'])->name('add');

        Route::post('/add', [StaffController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [StaffController::class, 'edit'])->name('edit');

        Route::post('/update', [StaffController::class, 'update'])->name('postEdit');

        Route::get('/destroy/{id}', [StaffController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('Post')->name('post.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');

        Route::get('/add', [PostController::class, 'create'])->name('add');

        Route::post('/add', [PostController::class, 'store'])->name('postAdd');

        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');

        Route::post('/update', [PostController::class, 'update'])->name('postEdit');

        Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('delete');
    });

});


Route::get('welcome', function () {
    return "Xin chào";
});