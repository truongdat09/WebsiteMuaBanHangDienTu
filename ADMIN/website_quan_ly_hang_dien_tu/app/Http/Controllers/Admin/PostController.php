<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PostDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostInsertRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index(PostDataTable $dataTable)
    {
        $title = 'Danh sách bài viết';
        return $dataTable->render('admin.post.index', compact('title'));
    }

    public function create()
    {
        $title = 'Thêm bài viết';
        return view('admin.post.insert', compact('title'));
    }

    public function store(PostInsertRequest $request)
    {
        $status = $this->postService->create($request);
        if ($status)
            return redirect()->route('admin.post.index')->with('success', 'Thêm thành công.');
        return back()->with('error', 'Thêm thất bại.');
    }

    public function edit($id)
    {
        $title = 'Cập nhật bài viết';
        if (!empty($id)) {
            $post = $this->postService->getById($id);
            if (!empty($post)) {
                $post = $post[0];
                return view('admin.post.update', compact('title', 'post'));
            }
        }
        return redirect()->route('admin.post.index')->with('error', 'Bài viết không tồn tại.');
    }

    public function update(PostUpdateRequest $request)
    {
        $status = $this->postService->update($request);
        if ($status)
            return redirect()->route('admin.post.index')->with('success', 'Cập nhật thành công.');
        return back()->with('error', 'Cập nhật thất bại.');
    }

    public function destroy($id)
    {
        $status = $this->postService->delete($id);
        if ($status)
            return redirect()->route('admin.post.index')->with('success', 'Xóa thành công.');
        return back()->with('error', 'Xóa thất bại.');
    }
}