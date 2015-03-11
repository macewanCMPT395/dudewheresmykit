<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Booking', function(Blueprint $table)
		{
            $table->increments('Booking_ID');
            $table->integer('User_ID');
            $table->integer('Origin_Branch_ID')->nullable();
            $table->integer('Destination_Branch_ID');
            $table->integer('Kit_ID');
            $table->date('Start_Date');
            $table->date('End_Date');
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
		Schema::drop('Booking');
	}

}
