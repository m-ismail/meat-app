<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\AnimalType;

class TypesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$faker = Faker::create();

		for( $i=0; $i<2; $i++ ){
			AnimalType::create([
				'name' => $faker->word(),
				'stock' => $faker->randomNumber(),
			]);
		}

	}

}
