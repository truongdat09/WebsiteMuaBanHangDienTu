<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    public function add_danhmuc_sanpham(){
        return view('admin.add_danhmuc_sanpham');
    }
    public function all_danhmuc_sanpham(){
        return view('admin.all_danhmuc_sanpham');
    }
}
