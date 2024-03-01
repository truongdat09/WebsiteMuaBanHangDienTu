<?php

namespace App\Repositories;

use App\Interfaces\Repositories\IUserRepository;
use App\Models\User;

use App\Models\NhanVien;

class UserRepository implements IUserRepository
{
    protected $user;

    public function __construct(NhanVien $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function getById($id)
    {
        return $this->user->where('id', $id)->get();
    }

    public function create($attributes)
    {
        return $this->user->create($attributes);
    }

    public function update($attributes)
    {
        return $this->user->where('id', $attributes['id'])->update($attributes);
    }

    public function delete($id)
    {
        return $this->user->where('id', $id)->delete();
    }
}