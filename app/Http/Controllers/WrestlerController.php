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
}
