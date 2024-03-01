<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        $title = 'Đăng nhập';
        return view('auth.login', compact('title'));
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:3'
        ], [
            'email.required' => 'Email không được bỏ trống.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự'
        ]);

        $result = Auth::attempt([
            'email' => $request->all()['email'],
            'password' => $request->all()['password']
        ]);
        if ($result)
            return redirect('/')->with('success', 'Đăng nhập thành công.');
        return redirect()->route('auth.login')->with('error', 'Email hoặc mật khẩu không chính xác.');
    }

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
            'email' => 'unique:users,email'
        ], [
            'email.unique' => 'Email đã tồn tại'
        ]);

        $status = $this->userService->create($request);

        if ($status)
            return redirect()->route('auth.login')->with('success', 'Đăng ký thành công.');
        return back()->with('error', 'Đăng ký thất bại');
    }
}