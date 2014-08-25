<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'username' => 'roy',
			'password' => Hash::make('123'),

			'name' => '杭州先行科技有限公司',
			'contact' => '123456789',
			'phone' => '123456789',
			'mobile' => '123456789',

			'c_num' => 1,
		));
	}
}
