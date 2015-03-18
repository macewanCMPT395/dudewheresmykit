<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKitForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('Kits', function(Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('Status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('Kits', function(Blueprint $table) {
            $table->dropForeign('status_id_foreign');
		});
	}
}