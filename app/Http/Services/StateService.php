<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\WrestlerState;
use App\WrestlerToState;
use Illuminate\Http\Request;

class StateService {
    public function createNewWrestlerState($wrestlerId, $stateId, $date, $url = null, $title, $description)
    {
        $newWrestlerState = new WrestlerToState();

        $newWrestlerState->uuid = Uuid::uuid4();
        $newWrestlerState->wrestler_id = $wrestlerId;
        $newWrestlerState->state_id = $stateId;
        $newWrestlerState->start = $date;
        $newWrestlerState->title = $title;
        $newWrestlerState->description = $description;
        $newWrestlerState->url = $url;

        $newWrestlerState->save();

        return $newWrestlerState;
    }

    public function getAllWrestlerStates()
    {
        return WrestlerState::all();
    }

    public function findByName(string $name)
    {
        return WrestlerState::where('name', $name)->first();
    }

    public function findById(int $id)
    {
        return WrestlerState::where('id', $id)->first();
    }

    public function findByUuid(string $uuid)
    {
        return WrestlerState::where('uuid', $uuid)->first();
    }

    public function getNameById(int $id)
    {
        $state = $this->findById($id);

        return $state->name;
    }
}