<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShipDateToBookings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('Bookings', function(Blueprint $table) {
			$table->date('shipped')->nullable();	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('Bookings', function(Blueprint $table) {
			$table->dropColumn('shipped');	
		});
	}

}
