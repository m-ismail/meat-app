<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$faker = Faker::create();

		for( $i=0; $i<5; $i++ ){
			User::create([
				'name' => $faker->name(),
				'mobile' => $faker->phoneNumber(),
				'email' => $faker->unique()->email(),
			]);
		}

	}

}
