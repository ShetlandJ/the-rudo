<?php

namespace App\Http\Services;

use App\Wrestler;

class WrestlerService {
    public function getAllWrestlers()
    {
        return Wrestler::all();
    }

    public function findByName(string $name)
    {
        return Wrestler::where('ring_name', $name)->first();
    }
}