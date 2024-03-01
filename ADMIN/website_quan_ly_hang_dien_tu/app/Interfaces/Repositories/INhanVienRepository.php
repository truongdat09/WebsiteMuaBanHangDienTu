<?php

namespace App\Interfaces\Repositories;

interface INhanVienRepository
{
    public function getAll();

    public function getById($id);

    public function create($attributes);

    public function update($attributes);

    public function delete($id);
}