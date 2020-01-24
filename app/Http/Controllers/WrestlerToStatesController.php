<?php

namespace App\Http\Controllers;

use App\Wrestler;
use Illuminate\Http\Request;
use App\Http\Services\StateService;
use App\Http\Services\WrestlerService;

class WrestlerToStatesController extends Controller
{
    public function create(Request $request, $wrestlerId, $stateId)
    {

      $wrestler = app(WrestlerService::class)->findByUuid($wrestlerId);
      $state = app(StateService::class)->findByUuid($stateId);

      $newState = app(StateService::class)->createNewWrestlerState(
        $wrestler->id,
        $state->id,
        $request->date,
        $request->url,
        $request->title,
        $request->description
      );

      return $newState;
    }
}
