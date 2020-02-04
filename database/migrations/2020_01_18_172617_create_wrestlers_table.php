<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWrestlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wrestlers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('forename');
            $table->uuid('uuid');
            $table->string('middle_names')->nullable();
            $table->string('surname');
            $table->string('ring_name');
            $table->string('slug');
            $table->boolean('active')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_death')->nullable();
            $table->string('picture')->nullable();
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
        Schema::dropIfExists('wrestlers');
    }
}
