<?php

use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'admin',
            'password' => Hash::make('admin@123'),
            'mobile' => '00000000000',
            'email' => 'admin@admin.com',
        ]);

    }

}
