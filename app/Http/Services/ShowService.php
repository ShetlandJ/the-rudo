<?php

namespace App\Http\Services;

use App\WrestlingShow;

class ShowService {
    public function getAll()
    {
        return WrestlingShow::all();
    }

    public function findByName(string $name)
    {
        return WrestlingShow::where('name', $name)->first();
    }
}