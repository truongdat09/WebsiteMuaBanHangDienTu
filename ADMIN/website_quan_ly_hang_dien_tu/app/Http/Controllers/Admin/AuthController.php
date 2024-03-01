<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// // use App\Http\Requests\UserRequest;
// use App\Services\NhanVienService;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class AuthController extends Controller
// {
//     protected $userService;

//     public function __construct(NhanVienService $userService)
//     {
//         $this->userService = $userService;
//     }

//     public function login()
//     {
//         $title = 'Đăng nhập';
//         return view('auth.login', compact('title'));
//     }

//     public function checkLogin(Request $request)
//     {
//         $request->validate([
//             // 'email' => 'required|email:rfc,dns',
//             'TAIKHOAN' => 'unique:nhanvien,TAIKHOAN',
//             'MATKHAU' => 'required|min:2'
//         ], [
//             'TAIKHOAN.required' => 'tài khoản không được bỏ trống.',
//             'TAIKHOAN.unique' => 'tài khoản này đã tồn tại',
//             // 'email.email' => 'Email không hợp lệ.',
//             'MATKHAU.required' => 'Mật khẩu không được để trống.',
//             'MATKHAU.min' => 'Mật khẩu phải có ít nhất 2 kí tự'
//        ]);

//        $result = Auth::attempt([
//            'TAIKHOAN' => $request->all()['TAIKHOAN'],
//            'MATKHAU' => $request->all()['MATKHAU']
//        ]);
//        if ($result)
//           return redirect('/')->with('success', 'Đăng nhập thành công.');
//        return redirect()->route('auth.login')->with('error', 'tài khoản hoặc mật khẩu không chính xác.');
//    }

//    public function logout()
//    {
//        Auth::logout();
//        return redirect()->route('auth.login');
//    }

//    public function register()
//    {
//        $title = 'Đăng ký';
//        return view('auth.register', compact('title'));
//    }

//    public function postInfo(Request $request)
//    {
//        $request->validate([
//            'TAIKHOAN' => 'unique:nhanvien,TAIKHOAN'
//        ], [
//            'TAIKHOAN.unique' => 'tài khoản này đã tồn tại'
//        ]);

//        $status = $this->userService->create($request);

//        if ($status)
//            return redirect()->route('auth.login')->with('success', 'Đăng ký thành công.');
//        return back()->with('error', 'Đăng ký thất bại');
//    }
//}

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $title = 'Đăng nhập';
        return view('auth.login', compact('title'));
    }

    // public function checkLogin(Request $request)
    // {
    //     $request->validate([
    //         'TAIKHOAN' => 'required',
    //         'MATKHAU' => 'required|min:2',
    //     ], [
    //         'TAIKHOAN.required' => 'Tài khoản không được bỏ trống.',
    //         'MATKHAU.required' => 'Mật khẩu không được để trống.',
    //         'MATKHAU.min' => 'Mật khẩu phải có ít nhất 2 kí tự.',
    //     ]);

    //     $credentials = $request->only('TAIKHOAN', 'MATKHAU');

    //     $result = Auth::attempt($credentials);

    //     if ($result) {
    //         return redirect('/')->with('success', 'Đăng nhập thành công.');
    //     }

    //     return redirect()->route('auth.login')->with('error', 'Tài khoản hoặc mật khẩu không chính xác.');
    // }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function register()
    {
        $title = 'Đăng ký';
        return view('auth.register', compact('title'));
    }

    public function postInfo(Request $request)
    {
        $request->validate([
            'TAIKHOAN' => 'required|unique:nhan_viens,TAIKHOAN',
            // Thêm các validation rules khác nếu cần
        ], [
            'TAIKHOAN.required' => 'Tài khoản không được bỏ trống.',
            'TAIKHOAN.unique' => 'Tài khoản này đã tồn tại.',
            // Thêm các thông báo lỗi khác nếu cần
        ]);

        $data = [
            'TAIKHOAN' => $request->input('TAIKHOAN'),
            'MATKHAU' => $request->input('MATKHAU'),
            // Thêm các trường dữ liệu khác nếu cần
        ];

        $status = DB::table('nhan_viens')->insert($data);

        if ($status) {
            return redirect()->route('auth.login')->with('success', 'Đăng ký thành công.');
        }

        return back()->with('error', 'Đăng ký thất bại');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'TAIKHOAN' => 'required',
            'MATKHAU' => 'required|min:2'
        ], [
            'TAIKHOAN.required' => 'Tài khoản không được để trống.',
            'MATKHAU.required' => 'Mật khẩu không được để trống.',
            'MATKHAU.min' => 'Mật khẩu phải có ít nhất 2 kí tự'
        ]);

        $user = DB::table('nhan_viens')
            ->where('TAIKHOAN', $request->input('TAIKHOAN'))
            ->where('MATKHAU', $request->input('MATKHAU'))
            ->first();

        if ($user) {
            // Nếu thông tin đăng nhập chính xác, thực hiện đăng nhập và chuyển hướng đến trang chính
            Auth::loginUsingId($user->MANV, true);
            return redirect('/')->with('success', 'Đăng nhập thành công.');
        }

        // Nếu thông tin đăng nhập không chính xác, chuyển hướng về trang đăng nhập với thông báo lỗi
        return redirect()->route('auth.login')->with('error', 'Tài khoản hoặc mật khẩu không chính xác.');
    }
}
