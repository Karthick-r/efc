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
            $table->string('match');
            $table->string('tosswon');
            $table->string('tournament');
            $table->string('inningfirst');
            $table->string('second');
            $table->string('totalruns');
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
