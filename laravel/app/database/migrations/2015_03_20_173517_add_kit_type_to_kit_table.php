<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKitTypeToKitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('Kits', function(Blueprint $table) {
			$table->integer('type_id')->nullable();
			$table->foreign('type_id')->references('id')->on('KitTypes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('Kits', function(Blueprint $table) {
			$table->dropColumn('type_id');
            $table->dropForeign('type_id_foreign');
		});
	}

}
