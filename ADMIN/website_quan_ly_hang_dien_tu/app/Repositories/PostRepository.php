<?php

namespace App\Repositories;

use App\Interfaces\Repositories\IPostRepository;
use App\Models\Post;

class PostRepository implements IPostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAll()
    {
        return $this->post->all();
    }

    public function getById($id)
    {
        return $this->post->where('id', $id)->get();
    }

    public function create($attributes)
    {
        return $this->post->create($attributes);
    }

    public function update($attributes)
    {
        return $this->post->where('id', $attributes['id'])->update($attributes);
    }

    public function delete($id)
    {
        return $this->post->where('id', $id)->delete();
    }
}