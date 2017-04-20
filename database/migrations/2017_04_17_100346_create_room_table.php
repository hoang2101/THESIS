<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
           $table->increments('room_id');
            $table->integer('hotel_id');
            $table->integer('room_floor');
            $table->integer('room_number');
            $table->integer('room_type');
            $table->boolean('is_booked');
            $table->integer('booked_id');
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
        Schema::dropIfExists('room');
    }
}
