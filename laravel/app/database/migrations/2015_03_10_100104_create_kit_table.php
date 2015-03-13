<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('Kits', function(Blueprint $table) {
            $table->increments('Kit_ID');
            $table->integer('Kit_Code')->unique();
            $table->string('Kit_Description')->nullable();
            $table->string('Items');
            $table->integer('Status_ID')->nullable();
            $table->string('Note')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('Kits');
	}
}