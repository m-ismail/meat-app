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

		/*\App\User::truncate();
		\App\AnimalType::truncate();
		\App\CuttingMethod::truncate();
		\App\DistributionCenter::truncate();
		\App\Order::truncate();*/

		Model::unguard();

		$this->call('AdminUserSeeder');
		/*$this->call('UserTableSeeder');
		$this->call('TypesTableSeeder');
		$this->call('MethodsTableSeeder');
		$this->call('CentersTableSeeder');
		$this->call('OrdersTableSeeder');*/
	}

}
