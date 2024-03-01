<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        //----------md5 là mã hoá password---------//
        //$admin_password = md5($request->admin_password);
        $admin_password = $request->admin_password;

        $result = DB::table('nhanviens')->where('TAIKHOAN',$admin_email)->where('MATKHAU',$admin_password)->first();
        if($result != null)
        {
            Session::put('admin_name',$result->TENNV);
            Session::put('admin_loai',$result->LoaiNhanVien);
            return Redirect::to('/dashboard');
        }
        else{    
            Session::put('message','Tài khoản hoặc mật khẩu không chính xác.');        
            return Redirect::to('/admin');
        }        
    }
    public function logout()
    {
        Session::put('admin_name',null);
        Session::put('admin_loai',null);
        return Redirect::to('/admin');
    }
}
