<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('passanger_id')->unsigned();
            $table->foreign('passanger_id')
                    ->references('id')
                    ->on('passangers')
                    ->onDelete('cascade');
            $table->string('pickUpAddress');
            $table->string('car');
            $table->string('flight')->default('No Flight Assigned');
            $table->string('phone')->default('No Phone');
            $table->string('dropOffAddress');
            $table->string('date');
            $table->string('time');
            $table->integer('fare');
            $table->boolean('fullPaid')->default(false);
            $table->string('distance');
            $table->string('duration');
            $table->text('riderMessage');
            $table->boolean('completed')->default(false);
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
        Schema::dropIfExists('bookings');
    }
}
