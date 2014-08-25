<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerZonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_zones', function($table)
		{
		    $table->increments('c_zoneid');
		   	$table->string('c_zonepath', 20);
		   	$table->string('c_zonename', 30);
		   	$table->integer('c_childsort')->nullable();
		   	$table->integer('c_rootsort')->nullable();
		   	$table->string('c_fullzonename', 200)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer_zones');
	}

}
