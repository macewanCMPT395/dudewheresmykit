<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('Items', function(Blueprint $table) {
            $table->increments('Item_ID');
            $table->string('Item_Name');
            $table->string('Item_Description');
            $table->integer('Asset_Tag');
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
		Schema::drop('Items');
	}
}