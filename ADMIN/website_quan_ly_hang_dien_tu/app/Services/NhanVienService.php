<?php

namespace App\Services;

use App\Repositories\NhanVienRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;


class NhanVienService
{
    protected $userRepo;

    public function __construct(NhanVienRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAll()
    {
        return $this->userRepo->getAll();
    }

    public function getById($id)
    {
        return $this->userRepo->getById($id);
    }

    public function create($attributes)
    {
        $newArr = $attributes->all();
        $newArr['MATKHAU'] = Hash::make($newArr['MATKHAU']);
        return $this->userRepo->create($newArr);
    }

    public function update($attributes)
    {
        $newArr = $attributes->all();
        $newArr = Arr::except($newArr, ['_token', 'password_confirmation']);
        return $this->userRepo->update($newArr);
    }

    public function delete($id)
    {
        return $this->userRepo->delete($id);
    }
}