<?php

namespace App\Http\Controllers;

use App\Wrestler;
use Illuminate\Http\Request;
use App\Http\Services\WrestlerService;

class WrestlerController extends Controller
{
    public function index()
    {
      $wrestlers = app(WrestlerService::class)->getAllWrestlers();

      return $wrestlers->toJson();
    }

    public function view(Request $request, string $id)
    {
      $wrestler = app(WrestlerService::class)->getWrestler($id);

      return $wrestler;
    }
}
