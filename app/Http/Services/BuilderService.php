<?php

namespace App\Http\Services;

use App\Wrestler;
use App\WrestlerToStates;

class BuilderService {
    public function buildWrestler(Wrestler $wrestler)
    {
        return [
            "ring_name" => $wrestler->ring_name,
            "forename" => $wrestler->forename,
            "surname" => $wrestler->surname,
            "active" => $wrestler->active,
        ];
    }

    public function buildState(WrestlerToStates $wrestlerToState)
    {
        $stateName = app(StateService::class)->getNameById($wrestlerToState->state_id);

        return [
            "start" => $wrestlerToState->start,
            "url" => $wrestlerToState->id,
            "state" => $stateName
        ];
    }
}