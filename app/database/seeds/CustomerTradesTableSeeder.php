<?php

class CustomerTradesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('customer_trades')->delete();
		CustomerTrades::create(array(
			'c_tradepath' => '101',
			'c_tradename' => '美食餐饮',
			'c_childsort' => '0',
			'c_rootsort' => '1',
		));
	}
}
