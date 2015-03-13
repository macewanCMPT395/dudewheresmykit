<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('User', function(Blueprint $table)
        {
            $table->foreign('Permission_ID')->references('Permission_ID')->on('Permission');
            $table->foreign('Branch_ID')->references('Branch_ID')->on('Branch');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('User', function(Blueprint $table)
		{
			$table->dropForeign('Permission_ID_foreign');
		});
	}

}
