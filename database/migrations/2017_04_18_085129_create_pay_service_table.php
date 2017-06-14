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
        Schema::create('book_service', function (Blueprint $table) {
            $table->increments('book_service_id');
            $table->integer('booking_id')->nullable();
            $table->integer('cost')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total')->nullable();
            $table->integer('account_id')->nullable();
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
        Schema::dropIfExists('book_service');
    }
}
