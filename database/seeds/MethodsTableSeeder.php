<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\CuttingMethod;

class MethodsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$faker = Faker::create();

		for( $i=0; $i<2; $i++ ){
			CuttingMethod::create([
				'name' => $faker->word(),
				'fees' => $faker->randomFloat(),
			]);
		}

	}

}
