<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookingForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Booking', function(Blueprint $table)
		{
            $table->foreign('User_ID')->references('User_ID')->on('User');
            $table->foreign('Origin_Branch_ID')->references('Branch_ID')->on('Branch');
            $table->foreign('Destination_Branch_ID')->references('Branch_ID')->on('Branch');
            $table->foreign('Kit_ID')->references('Kit_ID')->on('Kit');
    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Booking', function(Blueprint $table)
		{
            $table->dropForeign('User_ID_foreign');
            $table->dropForeign('Origin_Branch_ID');
            $table->dropForeign('Destination_Branch_ID');
            $table->dropForeign('Kit_ID_foreign');
		});
	}

}
