<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_service', function (Blueprint $table) {
             $table->increments('service_id');
            $table->string('service_name');
            $table->integer('service_cost');
            $table->integer('hotel_id');
            $table->string('service_description');
            $table->integer('discount');
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
        Schema::dropIfExists('hotel_service');
    }
}
