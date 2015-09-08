<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\DistributionCenter;

class CentersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$faker = Faker::create();

		for( $i=0; $i<2; $i++ ){
			DistributionCenter::create([
				'name' => $faker->word(),
				'address' => $faker->address(),
				'phone' => $faker->phoneNumber(),
				'work_from' => $faker->time(),
				'work_to' => $faker->time(),
			]);
		}

	}

}
