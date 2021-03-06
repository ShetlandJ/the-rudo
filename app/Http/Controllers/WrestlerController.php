<?php

namespace App\Http\Controllers;

use App\Http\Services\BuilderService;
use App\Wrestler;
use Illuminate\Http\Request;
use App\Http\Services\WrestlerService;
use PhpParser\BuilderFactory;

class WrestlerController extends Controller
{
    public function index()
    {
      $wrestlers = app(WrestlerService::class)->getAllWrestlers();

      return $wrestlers;
    }

    public function view(Request $request, string $slug)
    {
      $wrestler = app(WrestlerService::class)->findBySlug($slug);

      $wrestlerObject = app(WrestlerService::class)->formatWrestler($wrestler);

      return $wrestlerObject;
    }
}
