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
            $table->foreign('User_ID')->references('User_ID')->on('Users');
            $table->foreign('Origin_Branch_ID')->references('Branch_ID')->on('Branches');
            $table->foreign('Destination_Branch_ID')->references('Branch_ID')->on('Branches');
            $table->foreign('Kit_ID')->references('Kit_ID')->on('Kits');
    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('Bookings', function(Blueprint $table)
            $table->dropForeign('User_ID_foreign');
            $table->dropForeign('Origin_Branch_ID');
            $table->dropForeign('Destination_Branch_ID');
            $table->dropForeign('Kit_ID_foreign');
		});
	}
}