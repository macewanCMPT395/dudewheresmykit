<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKitForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Kit', function(Blueprint $table)
		{
            $table->foreign('Item_ID')->references('Item_ID')->on('Item');
            $table->foreign('Status_ID')->references('Status_ID')->on('Status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Kit', function(Blueprint $table)
		{
            $table->dropForeign('Item_ID_foreign');
            $table->dropForeign('Status_ID_foreign');
		});
	}

}
