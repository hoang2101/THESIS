<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
             $table->increments('booking_id');
            $table->integer('room_id');
            $table->date('date_from');
            $table->date('date_to');
            $table->string('first_name',20);
            $table->string('last_name',20);
            $table->smallInteger('number_people');
            $table->string('contry');
            $table->string('email');
            $table->string('phone_number',11);
            $table->string('passport');
            $table->enum('gender',['male','female']);
            $table->date('dob');
            $table->integer('account');
            $table->integer('type_booking');
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
        Schema::dropIfExists('booking');
    }
}
