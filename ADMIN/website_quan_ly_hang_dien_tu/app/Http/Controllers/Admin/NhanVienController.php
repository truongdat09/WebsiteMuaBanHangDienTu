<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;

namespace App\Http\Controllers\Admin;

use App\DataTables\NhanVienDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\NhanVienInsertRequest;
use App\Http\Requests\NhanVienUpdateRequest;
use App\Services\NhanVienService;

class NhanVienController extends Controller
{
    protected $nhanVienService;
    public function __construct(NhanVienService $nhanVienService)
    {
        $this->nhanVienService = $nhanVienService;
    }

    public function index(NhanVienDataTable $dataTable)
    {
        $title = 'Danh sách admin';
        return $dataTable->render('admin.nhanvien.index', compact('title'));
    }

    public function create()
    {
        $title = 'Thêm admin';
        return view('admin.nhanvien.insert', compact('title'));
    }

    public function store(NhanVienInsertRequest $request)
    {
        $status = $this->nhanVienService->create($request);

        if ($status)
            return redirect()->route('admin.nhanvien.index')->with('success', 'Thêm thành công.');
        return back()->with('error', 'Thêm thất bại');
    }

    public function edit($id)
    {
        if (!empty($id)) {
            $title = 'Cập nhật admin';
            $user = $this->nhanVienService->getById($id);
            if (!empty($user)) {
                $user = $user[0];
                return view('admin.nhanvien.update', compact('title', 'user'));
            }
        }
        return redirect()->route('admin.nhanvien.index')->with('error', 'Admin không tồn tại.');
    }

    public function update(NhanVienUpdateRequest $request)
    {
        $status = $this->nhanVienService->update($request);
        if ($status)
            return redirect()->route('admin.nhanvien.index')->with('success', 'Cập nhật thành công.');
        return back()->with('error', 'Cập nhật thất bại.');
    }

    public function destroy($id)
    {
        $status = $this->nhanVienService->delete($id);
        if ($status)
            return redirect()->route('admin.nhanvien.index')->with('success', 'Xóa thành công.');
        return back()->with('error', 'Xóa thất bại.');
    }
}
