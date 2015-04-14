<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToBookings extends Migration {
/** * Run the migrations.  * * @return void
	 */
	public function up() {
		Schema::table('Bookings', function(Blueprint $table) {
			$table->foreign('status_id')->references('id')->on('Status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('Bookings', function(Blueprint $table) {
			$table->dropColumn('status_id');
			$table->dropForeign('status_id_foreign');
		});
	}
}
