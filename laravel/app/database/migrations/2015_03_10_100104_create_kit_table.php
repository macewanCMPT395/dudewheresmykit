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
            $table->increments('id');
            $table->integer('code')->unique();
            $table->string('description')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('note')->nullable();
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
