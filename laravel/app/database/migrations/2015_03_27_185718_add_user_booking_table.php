<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
	   	Schema::create('User_Booking', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->foreign('user_id')->references('id')->on('Users');
			$table->integer('booking_id');
			$table->foreign('booking_id')->references('id')->on('Bookings');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('User_Booking');
	}
}
