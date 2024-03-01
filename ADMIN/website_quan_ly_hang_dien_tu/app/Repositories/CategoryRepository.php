<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\Repositories\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function getById($id)
    {
        return $this->category->where('id', $id)->get();
    }

    public function create($attributes)
    {
        return $this->category->create($attributes);
    }

    public function update($attributes)
    {
        return $this->category->where('id', $attributes['id'])->update($attributes);
    }

    public function delete($id)
    {
        return $this->category->where('id', $id)->delete();
    }
}