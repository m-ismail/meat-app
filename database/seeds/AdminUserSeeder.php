<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class AdminUserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        User::create([
            'name' => 'admin',
            'password' => Hash::make('admin@123'),
            'mobile' => '00000000000',
            'email' => 'admin@admin.com',
        ]);

    }

}
