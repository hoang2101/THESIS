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
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('email',150)->nullable();
            $table->string('accountpaypal',150)->nullable();
            $table->string('phone_number',100)->nullable();
            $table->string('pay_number',150)->nullable();
            $table->string('country',100)->nullable();
            $table->integer('type')->nullable();
            $table->string('username',150)->nullable();
            $table->string('password',150)->nullable();
            $table->date('dob')->nullable();
            $table->integer('number_visit')->nullable();
            $table->string('gender',100)->nullable();
            $table->string('image_link',200)->nullable();
            $table->integer('total_cost')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
