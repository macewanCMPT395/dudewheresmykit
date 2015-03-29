<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookingForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('Bookings', function(Blueprint $table) {
            $table->foreign('destination_branch_id')->references('id')->on('Branches');
            $table->foreign('kit_id')->references('id')->on('Kits');
    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('Bookings', function(Blueprint $table) {
            $table->dropForeign('destination_branch_id');
            $table->dropForeign('kit_id_foreign');
		});
	}
}
