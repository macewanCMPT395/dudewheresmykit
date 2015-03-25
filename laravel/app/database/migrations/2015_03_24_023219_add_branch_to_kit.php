<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBranchToKit extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Kits', function(Blueprint $table) {
			$table->integer('branch_id')->nullable();
			$table->foreign('branch_id')->references('id')->on('Branches');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Kits', function(Blueprint $table) {
			$table->dropColumn('branch_id');
			$table->dropForeign('branch_id_foreign');
		});	
	}

}
