<?php

use App\Http\Services\SeederService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RunSeederWrestlerSeeder extends Migration
{
    public function up()
    {
        app(SeederService::class)->seedWrestlers();
        app(SeederService::class)->seedPromotions();
        app(SeederService::class)->seedWrestlingShows();
        app(SeederService::class)->seedWrestlersToShows();
        app(SeederService::class)->seedStates();
        app(SeederService::class)->seedWrestlerToStates();
    }
}
