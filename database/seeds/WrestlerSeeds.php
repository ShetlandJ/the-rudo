<?php

use App\Wrestler;
use Illuminate\Database\Seeder;

class WrestlerSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wrestler = new Wrestler();

        $wrestler->forename = "Colby";
        $wrestler->surname = "Lopez";
        $wrestler->ring_name = "Seth Rollins";
        $wrestler->active = 1;

    }
}
