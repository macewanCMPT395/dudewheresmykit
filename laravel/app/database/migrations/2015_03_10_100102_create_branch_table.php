<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Branch', function(Blueprint $table)
		{
            $table->increments('Branch_ID');
            $table->string('Name');
            $table->string('Branch_Code');
            $table->string('Address');
            $table->string('Phone_Number');
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
		Schema::drop('Branch');
	}

}
