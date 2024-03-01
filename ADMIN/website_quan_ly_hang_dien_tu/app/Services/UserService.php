<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;


class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
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
        $newArr['password'] = Hash::make($newArr['password']);
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