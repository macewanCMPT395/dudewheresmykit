<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('Users', function(Blueprint $table) {
            $table->foreign('Branch_ID')->references('Branch_ID')->on('Branches');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('Users', function(Blueprint $table) {
			$table->dropForeign('Branch_ID_foreign');
		});
	}

}
