<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('Users', function(Blueprint $table) {
            $table->increments('User_ID');
            $table->string('First_Name');
            $table->string('Last_Name');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Phone_Number');
            //0=User, 1=Manager, 2=Admin
            $table->integer('Permission_ID');
            $table->integer('Branch_ID')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('Users');
	}
}