<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoresheets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('match')->nullable();
            $table->string('team1')->nullable();
            $table->string('team2')->nullable();
            $table->string('t1score')->nullable();
            $table->string('t2team1')->nullable();
            $table->string('t1overs')->nullable();
            $table->string('t2overs')->nullable();
            $table->string('city')->nullable();
            $table->string('tournament')->nullable();
            $table->string('tosswon')->nullable();
            $table->string('inningfirst')->nullable();
            $table->string('second')->nullable();
            $table->string('totalruns')->nullable();
            $table->boolean('live')->nullable();
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
        Schema::dropIfExists('scoresheets');
    }
}
