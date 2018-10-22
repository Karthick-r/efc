<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('phone')->unique();
            $table->string('zone')->nullable();
            $table->integer('pincode')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('avatar')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->integer('status');
            $table->boolean('deleted_on_off');
            $table->boolean('admin');
            $table->integer('role_id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
