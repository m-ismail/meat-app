<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Order;

class OrdersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$faker = Faker::create();

		for( $i=0; $i<10; $i++ ){
			Order::create([
				'status' => $faker->randomElement([Order::STATUS_NEW, Order::STATUS_CONFIRMED, Order::STATUS_CANCELLED, Order::STATUS_DELIVERED]),
				'book_time' => $faker->dateTime(),
				'type_id' => $faker->numberBetween(1, 2),
				'method_id' => $faker->numberBetween(1, 2),
				'center_id' => $faker->numberBetween(1, 2),
				'user_id' => $faker->numberBetween(1, 5),
			]);
		}

	}

}
