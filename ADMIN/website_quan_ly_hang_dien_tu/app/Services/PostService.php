<?php

namespace App\Services;

use App\Interfaces\Repositories\IPostRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostService
{
    protected $postRepo;

    public function __construct(IPostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function getAll()
    {
        return $this->postRepo->getAll();
    }

    public function getById($id)
    {
        return $this->postRepo->getById($id);
    }

    public function create($attributes)
    {
        $newArr = $attributes->all();
        $slug = Str::slug($newArr['title'], '-');
        $newArr = Arr::add($newArr, 'slug', $slug);
        $newArr = Arr::add($newArr, 'users_id', Auth::user()->id);
        return $this->postRepo->create($newArr);
    }

    public function update($attributes)
    {
        $newArr = Arr::except($attributes->all(), '_token');
        $slug = Str::slug($newArr['title'], '-');
        $newArr = Arr::add($newArr, 'slug', $slug);
        $newArr = Arr::add($newArr, 'users_id', Auth::user()->id);
        return $this->postRepo->update($newArr);
    }

    public function delete($id)
    {
        return $this->postRepo->delete($id);
    }
}