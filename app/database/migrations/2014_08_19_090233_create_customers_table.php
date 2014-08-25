<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function($table)
		{
		    $table->increments('id');
		   	$table->integer('c_add_userid');
		    $table->string('c_name', 50);
		   	$table->string('c_tradepath', 50)->nullable();
		   	$table->string('c_zonepath', 50)->nullable();
		   	$table->string('c_address', 250);
		   	$table->string('c_postcode', 6)->nullable();
		   	$table->string('c_businesslicence', 20)->nullable();
		   	$table->dateTime('c_businesslicencedate')->nullable();
		   	$table->string('c_siteurl', 150)->nullable();
		   	$table->string('c_registeraddress', 150)->nullable();
		   	$table->string('c_registerdate', 20)->nullable();
		   	$table->string('c_registermoney', 50)->nullable();
		   	$table->string('c_mainoperation', 3000)->nullable();
		   	$table->string('c_businessscope', 250)->nullable();
		   	$table->string('c_mainmarket', 250)->nullable();
		   	$table->string('c_corporation', 255)->nullable();
		   	$table->string('c_corporationid', 20)->nullable();
		   	$table->string('c_dutyparagraph', 50)->nullable();
		   	$table->integer('c_nature')->nullable();
		   	$table->integer('c_character')->nullable();
		   	$table->integer('c_fromtype')->nullable();
		   	$table->string('c_keyword', 50)->nullable();
		   	$table->longText('c_brief')->nullable();
		   	$table->integer('c_businessmode')->nullable();
		   	$table->integer('c_employeenumber')->nullable();
		   	$table->integer('c_yearturnover')->nullable();
		   	$table->string('c_sourceurl', 200)->nullable();
		   	$table->dateTime('c_createtime')->nullable();
		   	$table->integer('c_status')->nullable();
		   	$table->string('c_icp', 50)->nullable();

		   	$table->longText('c_remark')->nullable(); //审核备注

		   	$table->string('c_contact', 80)->nullable(); //联系人
		   	$table->string('c_phone', 50)->nullable(); //电话号码 
		   	$table->string('c_mobile', 50)->nullable(); //手机
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
