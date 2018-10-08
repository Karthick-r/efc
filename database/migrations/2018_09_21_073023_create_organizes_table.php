<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->date('matchdate')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->integer('pin');
            $table->string('whovswho');
            $table->string('currency');
            $table->integer('entryfee');
            $table->string('lastdayforpay');
            $table->string('overs');
            $table->string('dresscode');
            $table->string('uniform');
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
        Schema::dropIfExists('organizes');
    }
}
