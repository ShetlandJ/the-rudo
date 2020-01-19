<?php

namespace App\Http\Services;

use App\WrestlerState;

class StateService {
    public function getAllWrestlerStates()
    {
        return WrestlerState::all();
    }

    public function findByName(string $name)
    {
        return WrestlerState::where('name', $name)->first();
    }
}