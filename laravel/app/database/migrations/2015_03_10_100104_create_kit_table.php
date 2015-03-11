<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Kit', function(Blueprint $table)
		{
            $table->increments('Kit_ID');
            $table->integer('Kit_Code')->unique();
            $table->string('Kit_Description')->nullable();
            $table->integer('Item_ID')->nullable();
            $table->integer('Status_ID')->nullable();
            $table->integer('Item_Amount')->nullable();
            $table->string('Note')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Kit');
	}

}
