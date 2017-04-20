<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_service', function (Blueprint $table) {
            $table->increments('pay_service_id');
            $table->integer('booked_id');
            $table->integer('cost');
            $table->integer('quantity');
            $table->integer('service_id');
            $table->integer('discount');
            $table->integer('total');
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
        Schema::dropIfExists('pay_service');
    }
}
