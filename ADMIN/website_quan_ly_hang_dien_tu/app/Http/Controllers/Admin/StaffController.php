<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $title = 'Danh sách admin';
        $data = DB::table('nhan_viens')->get();
        return view('admin.nhanvien.index', compact('title', 'data'));
    }

    public function create()
    {
        $title = 'Thêm admin';
        return view('admin.nhanvien.insert', compact('title'));
    }

    public function store(Request $request)
    {
        $data = [
            'MANV' => $request->input('MANV'),
            'TENNV' => $request->input('TENNV'),
            'GIOITINH' => $request->input('GIOITINH'),
            'SDT' => $request->input('SDT'),
            'MATKHAU' => $request->input('MATKHAU'),
            'TAIKHOAN' => $request->input('TAIKHOAN'),
            'LoaiNhanVien' => $request->input('LoaiNhanVien'),
        ];

        $status = DB::table('nhan_viens')->insert($data);

        if ($status) {
            return redirect()->route('admin.nhanvien.index')->with('success', 'Thêm thành công.');
        }

        return back()->with('error', 'Thêm thất bại');
    }

    public function edit($id)
    {
        if (!empty($id)) {
            $title = 'Cập nhật admin';
            $user = DB::table('nhan_viens')->where('MANV', $id)->first();

            if (!empty($user)) {
                return view('admin.nhanvien.update', compact('title', 'user'));
            }
        }

        return redirect()->route('admin.nhanvien.index')->with('error', 'Admin không tồn tại.');
    }

    public function update(Request $request)
    {
        $data = [
            'TENNV' => $request->input('TENNV'),
            'GIOITINH' => $request->input('GIOITINH'),
            'SDT' => $request->input('SDT'),
            'MATKHAU' => $request->input('MATKHAU'),
            'TAIKHOAN' => $request->input('TAIKHOAN'),
            'LoaiNhanVien' => $request->input('LoaiNhanVien'),
        ];

        $status = DB::table('nhan_viens')->where('MANV', $request->input('MANV'))->update($data);

        if ($status) {
            return redirect()->route('admin.nhanvien.index')->with('success', 'Cập nhật thành công.');
        }

        return back()->with('error', 'Cập nhật thất bại.');
    }

    public function destroy($id)
    {
        $status = DB::table('nhan_viens')->where('MANV', $id)->delete();

        if ($status) {
            return redirect()->route('admin.nhanvien.index')->with('success', 'Xóa thành công.');
        }

        return back()->with('error', 'Xóa thất bại.');
    }
}
