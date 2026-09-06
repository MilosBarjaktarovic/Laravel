<?php

namespace App\Repositories;

use App\Models\Ocene;

class OcenaRepository
{
    public function getAll()
    {
        return Ocene::all();
    }

    public function create(array $data)
    {
        return Ocene::create($data);
    }
}
