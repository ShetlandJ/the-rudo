<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWrestlerToShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wrestler_to_shows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('wrestler_id')->unsigned();
            $table->bigInteger('show_id')->unsigned();
            $table->date('joined_show')->nullable();
            $table->date('left_show')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wrestler_to_shows');
    }
}
