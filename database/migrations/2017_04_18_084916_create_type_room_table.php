<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_room', function (Blueprint $table) {
            $table->increments('type_room_id');
            $table->string('type_name',100)->nullable();
            $table->integer('cost')->nullable();
            $table->integer('hotel_id')->nullable();
            $table->string('description')->nullable();
            $table->integer('number_people')->nullable();
            $table->integer('number_kid')->nullable();
            $table->string('image',150)->nullable();
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
        Schema::dropIfExists('type_room');
    }
}
