<?php

namespace App\Http\Services;

use App\Wrestler;
use App\WrestlerToStates;
use App\WrestlingPromotion;
use App\WrestlingShow;

class BuilderService {
    public function buildWrestler(Wrestler $wrestler)
    {
        return [
            "ring_name" => $wrestler->ring_name,
            "uuid" => $wrestler->uuid,
            "forename" => $wrestler->forename,
            "surname" => $wrestler->surname,
            "active" => $wrestler->active,
            "picture" => $wrestler->picture
        ];
    }

    public function buildState(WrestlerToStates $wrestlerToState)
    {
        $state = app(StateService::class)->findById($wrestlerToState->state_id);

        return [
            "uuid" => $wrestlerToState->uuid,
            "start" => $wrestlerToState->start,
            "url" => $wrestlerToState->url,
            "name" => $state->name,
            "colour" => $state->colour,
            "title" => $wrestlerToState->title,
            "description" => $wrestlerToState->description
        ];
    }

    public function buildShow(WrestlingShow $show)
    {
        $promotion = app(PromotionService::class)->findById($show->promotion_id);
        $promotion = app(BuilderService::class)->buildPromotion($promotion);

        return [
            "uuid" => $show->uuid,
            "name" => $show->name,
            "promotion" => $promotion
        ];
    }

    public function buildPromotion(WrestlingPromotion $promotion)
    {
        return [
            "uuid" => $promotion->uuid,
            "name" => $promotion->name,
            "alias" => $promotion->alias,
            "active" => $promotion->active
        ];
    }
}