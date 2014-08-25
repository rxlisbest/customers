<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
		    $table->increments('id');
		    $table->string('username', 20);
		    $table->string('password' ,255);
		    
		    $table->string('name' ,255);
		    $table->string('contact' ,80);
		    $table->string('phone' ,50);
		    $table->string('mobile' ,50);

		    $table->integer('c_num');
		    $table->string('remember_token', 100)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}
}
