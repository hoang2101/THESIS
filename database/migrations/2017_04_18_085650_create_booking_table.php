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
            $table->integer('room_id')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->string('first_name',20)->nullable();
            $table->string('last_name',20)->nullable();
            $table->smallInteger('number_people')->nullable();
            $table->string('contry')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number',11)->nullable();
            $table->string('passport')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->date('dob')->nullable();
            $table->integer('account')->nullable();
            $table->integer('type_booking')->nullable();
            $table->date('booked_date')->nullable();
            
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
