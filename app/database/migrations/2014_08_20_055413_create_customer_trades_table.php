<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('customer_trades', function($table)
		{
		    $table->increments('c_tradeid');
		   	$table->string('c_tradepath', 20);
		   	$table->string('c_tradename', 30);
		   	$table->integer('c_childsort')->nullable();
		   	$table->integer('c_rootsort')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer_trades');
	}

}
