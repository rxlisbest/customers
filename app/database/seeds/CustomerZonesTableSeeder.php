<?php

class CustomerZonesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('customer_zones')->delete();
		CustomerZones::create(array(
			'c_zonepath' => '11',
			'c_zonename' => '北京市',
			'c_childsort' => '0',
			'c_rootsort' => '1',
		));
		CustomerZones::create(array(
			'c_zonepath' => '1101',
			'c_zonename' => '市辖区',
			'c_childsort' => '0',
			'c_rootsort' => '1',
		));
	}
}
