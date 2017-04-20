<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->increments('account_id');
            $table->string('first_name',20);
            $table->string('last_name',20);
            $table->string('email',50)->unique();
            $table->string('phone_number',11);
            $table->string('pay_number');
            $table->string('adress',100);
            $table->integer('type');
            $table->string('username',20);
            $table->string('password',20);
            $table->date('dob');
            $table->integer('number_visit');
            $table->enum('gender', ['male', 'female']);
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
        Schema::dropIfExists('account');
    }
}
