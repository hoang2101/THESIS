<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->increments('hotel_id');
            $table->string('hotel_name',100)->nullable();
            $table->string('hotel_address',150)->nullable();
            $table->string('hotel_star')->nullable();
            $table->string('account_id',150)->nullable();
            $table->string('hotel_url',150)->nullable();
            $table->integer('config_id')->nullable();
            $table->date('expire_date')->nullable();
            $table->integer('total_booking')->nullable();
            $table->integer('total_room')->nullable();
            $table->boolean('is_kid')->default(1);
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
        Schema::dropIfExists('hotel');
    }
}
