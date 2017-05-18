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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('pay_number')->nullable();
            $table->string('country')->nullable();
            $table->integer('type')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->date('dob')->nullable();
            $table->integer('number_visit')->nullable();
            $table->string('gender')->nullable();
            $table->string('image_link')->nullable();
            $table->integer('hotel_id')->nullable();
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
