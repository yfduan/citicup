<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		//$this->call('UserTableSeeder');
		
		//$this->call('AreaTableSeeder');
		//$this->call('UnivTableSeeder');
		//$this->call('AuthenTableSeeder');
		//$this->call('AdminTableSeeder');
		//$this->call('ProcessTableSeeder');
		//$this->call('ConfigTableSeeder');
		$this->call('TypeTableSeeder');
	}

}
