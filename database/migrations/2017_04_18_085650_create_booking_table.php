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
             $table->integer('hotel_id')->nullable();
            $table->string('room_id')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->smallInteger('number_people')->nullable();
            $table->string('contry')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number',11)->nullable();
            $table->string('passport')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->integer('account_id')->nullable();
            $table->integer('type_booking')->nullable();
            $table->date('booked_date')->nullable();
            $table->date('date_checkin')->nullable();
            $table->date('date_checkout')->nullable();
            $table->boolean('is_checkin')->default('0');
            $table->integer('total_cost_room')->nullable();
            $table->integer('deposit')->nullable();
            $table->integer('total_cost_service')->nullable();
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
        Schema::dropIfExists('booking');
    }
}
