<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('organize_id')->unsigned()->index();
            $table->integer('team_id')->unsigned()->index();
            $table->string('noofteams')->nullable();
            $table->string('tourtype')->nullable();
            $table->string('tourentry')->nullable();
            $table->string('currency')->nullable();
            $table->integer('amount')->nullable();
            $table->string('lastdayforpay')->nullable();
            $table->string('overs')->nullable();
            $table->string('dresscode')->nullable();
            $table->string('uniform')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('tournaments');
    }
}
