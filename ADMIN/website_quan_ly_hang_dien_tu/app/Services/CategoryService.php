<?php
namespace App\Services;

use App\Interfaces\Repositories\ICategoryRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class CategoryService
{
    protected $catRepo;

    public function __construct(ICategoryRepository $catRepo)
    {
        $this->catRepo = $catRepo;
    }

    public function getAll()
    {
        return $this->catRepo->getAll();
    }

    public function getById($id)
    {
        return $this->catRepo->getById($id)->toArray();
    }

    public function create($request)
    {
        $slug = Str::slug($request->all()['name'], '-');
        $newArr = Arr::add($request->all(), 'slug', $slug);
        return $this->catRepo->create($newArr);
    }

    public function update($request)
    {
        $slug = Str::slug($request->all()['name'], '-');
        $newArr = Arr::add($request->all(), 'slug', $slug);
        $newArr = Arr::except($newArr, ['_token']);
        return $this->catRepo->update($newArr);
    }

    public function delete($id)
    {
        return $this->catRepo->delete($id);
    }
}
?>