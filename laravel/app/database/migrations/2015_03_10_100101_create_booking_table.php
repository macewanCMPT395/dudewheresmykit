<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('Bookings', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('destination_branch_id');
            $table->integer('kit_id');
            $table->date('start_date');
            $table->date('end_date');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('Bookings');
	}
}
