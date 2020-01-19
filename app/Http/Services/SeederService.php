<?php

namespace App\Http\Services;

use App\Wrestler;
use Carbon\Carbon;
use App\WrestlerState;
use App\WrestlingShow;
use App\WrestlerToShow;
use App\WrestlerToStates;
use App\WrestlersToStates;
use App\WrestlingPromotion;
use App\WrestlerToPromotion;
use App\WrestlersToPromotions;
use App\Http\Services\StateService;
use App\Http\Services\WrestlerService;

class SeederService {
    public function seedWrestlers()
    {
        $seth = new Wrestler();
        $seth->forename = "Colby";
        $seth->surname = "Lopez";
        $seth->ring_name = "Seth Rollins";
        $seth->active = 1;

        $seth->save();

        $roman = new Wrestler();
        $roman->forename = "Leati";
        $roman->surname = "Anao'i";
        $roman->ring_name = "Roman Reigns";
        $roman->active = 1;

        $roman->save();
    }

    public function seedPromotions()
    {
        $wwe = new WrestlingPromotion();
        echo "Seed Promotions";

        $wwe->name = "World Wrestling Entertianment";
        $wwe->alias = "WWE";
        $wwe->save();
    }

    public function seedWrestlingShows()
    {
        echo "Seed Shows";

        $raw = new WrestlingShow();
        $wwe = app(PromotionService::class)->findByAlias('WWE');

        $raw->name = 'Raw';
        $raw->promotion_id = $wwe->id;
        $raw->save();
    }

    // public function seedWrestlersToPromotions()
    // {
    //     echo "Seed Wrestlers to Promotions";

    //     $seth = app(WrestlerService::class)->findByName('Seth Rollins');
    //     $raw = app(ProService::class)->findByName('Raw');

    //     $sethToWWE = new WrestlerToPromotion();
    //     $sethToWWE->wrestler_id = $seth->id;
    //     $sethToWWE->promotion_id = $raw->id;
    //     $sethToWWE->save();
    // }

    public function seedWrestlersToShows()
    {
        echo "Seed Wrestlers to Shows";

        $seth = app(WrestlerService::class)->findByName('Seth Rollins');
        $raw = app(ShowService::class)->findByName('Raw');

        $sethToWWE = new WrestlerToShow();
        $sethToWWE->wrestler_id = $seth->id;
        $sethToWWE->show_id = $raw->id;
        $sethToWWE->save();
    }

    public function seedStates()
    {
        echo "Seed States";

        $states = array(
            array("name" => "Face", "colour" => '#b6d7a7'),
            array("name" => "Heel", "colour" => '#ea9999'),
            array("name" => "Tweener", "colour" => '#ffe599'),
            array("name" => "Unclear", "colour" => '#b4a7d6'),
            array("name" => "Inactive", "colour" => '#b7b7b7')
        );

        foreach ($states as $state) {
            $wrestlerState = new WrestlerState();
            $wrestlerState->name = $state['name'];
            $wrestlerState->colour = $state['colour'];
            $wrestlerState->save();
        }
    }

    public function seedWrestlerToStates()
    {
        $seth = app(WrestlerService::class)->findByName('Seth Rollins');
        $heel = app(StateService::class)->findByName('Heel');
        $face = app(StateService::class)->findByName('Face');

        $sethHeel = new WrestlerToStates();
        $sethHeel->wrestler_id = $seth->id;
        $sethHeel->state_id = $heel->id;
        $sethHeel->start = Carbon::create(2012, 11, 18);
        $sethHeel->save();

        $sethHeel = new WrestlerToStates();
        $sethHeel->wrestler_id = $seth->id;
        $sethHeel->state_id = $face->id;
        $sethHeel->start = Carbon::create(2014, 3, 17);
        $sethHeel->save();
    }
}