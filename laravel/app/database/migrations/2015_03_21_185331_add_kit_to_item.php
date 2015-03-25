<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKitToItem extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Items', function(Blueprint $table) {
			$table->integer('kit_id')->nullable();
			$table->foreign('kit_id')->references('id')->on('Kits');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Items', function(Blueprint $table) {
			$table->dropColumn('kit_id');
			$table->dropForeign('kit_id_foreign');
		});	
	}

}
