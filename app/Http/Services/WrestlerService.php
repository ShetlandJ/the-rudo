<?php

namespace App\Http\Services;

use App\Wrestler;
use App\WrestlerToStates;
use App\WrestlingShow;

class WrestlerService {
    public function getAllWrestlers()
    {
        $wrestlers = Wrestler::all();

        $allWrestlers = [];
        foreach ($wrestlers as $wrestler) {
            $allWrestlers[] = $this->formatWrestler($wrestler);
        }

        return $allWrestlers;
    }

    public function findByName(string $name)
    {
        return Wrestler::where('ring_name', $name)->first();
    }

    public function findBySlug(string $slug)
    {
        return Wrestler::where('slug', $slug)->first();
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

    public function getCurrentShow(Wrestler $wrestler)
    {
        $query = WrestlingShow::query();

        $query->join('wrestler_to_shows', 'wrestler_to_shows.show_id', '=', 'wrestling_shows.id');

        $query->orderBy('wrestler_to_shows.joined_show', 'DESC');

        return $query->first();
    }

    public function formatWrestler(Wrestler $wrestler)
    {
        $states = $this->getStateList($wrestler);
        $currentShow = $this->getCurrentShow($wrestler);

        $wrestlerObject = app(BuilderService::class)->buildWrestler($wrestler);

        $wrestlerObject['states'] = $states;
        $wrestlerObject['currentShow'] = app(BuilderService::class)->buildShow($currentShow);

        return $wrestlerObject;
    }
}