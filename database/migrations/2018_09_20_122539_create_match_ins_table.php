<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('oranize_id')->unsigned()->index();
            $table->integer('team_id')->unsigned()->index();

            $table->date('year')->nullable();
            $table->string('team')->nullable();
            $table->string('vsteam')->nullable();
            $table->integer('teamsc')->nullable();
            $table->integer('yourscore')->nullable();
            $table->integer('yourwicket')->nullable();
           $table->integer('comsc')->nullable();
            $table->string('result')->nullable();
            $table->string('location')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('organize_id')->references('id')->on('organizes');
            $table->foreign('team_id')->references('id')->on('teams');

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
        Schema::dropIfExists('match_ins');
    }
}
