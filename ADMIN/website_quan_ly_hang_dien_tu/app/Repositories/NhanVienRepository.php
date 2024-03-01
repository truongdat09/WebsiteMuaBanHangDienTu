<?php

namespace App\Repositories;

use App\Interfaces\Repositories\INhanVienRepository;

use App\Models\NhanVien;

class NhanVienRepository implements INhanVienRepository
{
    protected $nhanVien;

    public function __construct(NhanVien $nhanVien)
    {
        $this->nhanVien = $nhanVien;
    }

    public function getAll()
    {
        return $this->nhanVien->all();
    }

    public function getById($id)
    {
        return $this->nhanVien->where('id', $id)->get();
    }

    public function create($attributes)
    {
        return $this->nhanVien->create($attributes);
    }

    public function update($attributes)
    {
        return $this->nhanVien->where('id', $attributes['id'])->update($attributes);
    }

    public function delete($id)
    {
        return $this->nhanVien->where('id', $id)->delete();
    }
}