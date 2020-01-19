<?php

namespace App\Http\Services;

use App\Wrestler;
use App\WrestlerToStates;

class WrestlerService {
    public function getAllWrestlers()
    {
        return Wrestler::all();
    }

    public function findByName(string $name)
    {
        return Wrestler::where('ring_name', $name)->first();
    }

    public function findByUuid(string $uuid)
    {
        return Wrestler::where('uuid', $uuid)->first();
    }

    public function getWrestler(int $id)
    {
        $wrestler = Wrestler::where('id', $id)->first();

        return $this->formatWrestler($wrestler);
    }

    public function getStateList(Wrestler $wrestler)
    {
        $stateList = WrestlerToStates::where('wrestler_id', $wrestler->id)
            ->orderBy('start')
            ->get();

        $states = [];

        foreach ($stateList as $state) {
            $states[] = app(BuilderService::class)->buildState($state);
        }
        return $states;
    }

    private function formatWrestler(Wrestler $wrestler)
    {
        $states = $this->getStateList($wrestler);
        $wrestler = app(BuilderService::class)->buildWrestler($wrestler);

        $wrestler['states'] = $states;

        return $wrestler;
    }
}