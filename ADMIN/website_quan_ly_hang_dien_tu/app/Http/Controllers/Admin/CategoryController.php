<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryInsertRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $catService;
    public function __construct(CategoryService $categoryService)
    {
        $this->catService = $categoryService;
    }

    public function index(CategoryDataTable $dataTable)
    {
        $title = 'Quản lý chuyên mục';
        return $dataTable->render('admin.category.index', compact('title'));
    }

    public function create()
    {
        $title = 'Thêm chuyên mục';
        $catList = $this->catService->getAll();
        return view('admin.category.insert', compact('title', 'catList'));
    }

    public function store(CategoryInsertRequest $request)
    {
        $status = $this->catService->create($request);
        if ($status)
            return redirect()->route('admin.category.add')->with('success', 'Thêm thành công.');
        return back()->with('error', 'Thêm thất bại.');
    }

    public function edit($id)
    {
        $title = 'Cập nhật chuyên mục';
        if (!empty($id)) {
            $cat = $this->catService->getById($id);
            if (!empty($cat)) {
                $cat = $cat[0];
                $catList = $this->catService->getAll();
                return view('admin.category.update', compact('title', 'cat', 'catList'));
            }
        }
        return redirect()->route('admin.category.index')->with('error', 'Chuyên mục không tồn tại.');
    }

    public function update(CategoryUpdateRequest $request)
    {
        $status = $this->catService->update($request);
        if ($status)
            return redirect()->route('admin.category.index')->with('success', 'Chỉnh sửa thành công.');
        return back()->with('error', 'Chỉnh sửa thất bại.');
    }

    public function destroy($id)
    {
        $status = $this->catService->delete($id);
        if ($status)
            return redirect()->route('admin.category.index')->with('success', 'Xóa thành công.');
        return back()->with('error', 'Xóa thất bại.');
    }
}