<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserInsertRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UserDataTable $dataTable)
    {
        $title = 'Danh sách admin';
        return $dataTable->render('admin.user.index', compact('title'));
    }

    public function create()
    {
        $title = 'Thêm admin';
        return view('admin.user.insert', compact('title'));
    }

    public function store(UserInsertRequest $request)
    {
        $status = $this->userService->create($request);

        if ($status)
            return redirect()->route('admin.user.index')->with('success', 'Thêm thành công.');
        return back()->with('error', 'Thêm thất bại');
    }

    public function edit($id)
    {
        if (!empty($id)) {
            $title = 'Cập nhật admin';
            $user = $this->userService->getById($id);
            if (!empty($user)) {
                $user = $user[0];
                return view('admin.user.update', compact('title', 'user'));
            }
        }
        return redirect()->route('admin.user.index')->with('error', 'Admin không tồn tại.');
    }

    public function update(UserUpdateRequest $request)
    {
        $status = $this->userService->update($request);
        if ($status)
            return redirect()->route('admin.user.index')->with('success', 'Cập nhật thành công.');
        return back()->with('error', 'Cập nhật thất bại.');
    }

    public function destroy($id)
    {
        $status = $this->userService->delete($id);
        if ($status)
            return redirect()->route('admin.user.index')->with('success', 'Xóa thành công.');
        return back()->with('error', 'Xóa thất bại.');
    }
}