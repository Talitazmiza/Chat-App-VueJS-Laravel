<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        User::factory()->count(3)->create(
        	// [
        	// 	'name' => 'aditya',
        	// 	'email' => 'aditya@aditya.com',
        	// ]
        //); // 3 merupakan banyaknya data yang akan di masukkan
        User::factory()->create(
            [
            'name'  => 'leon',
            'email' => 'leon@gmail.com',
            'password'  => bcrypt('password')
            ],
        );
        User::factory()->create(
            [
                'name'  => 'ada wong',
                'email' => 'ada@gmail.com',
                'password'  => bcrypt('password')
            ]
        );
        User::factory()->create(
            [
                'name'  => 'helena harper',
                'email' => 'helena@gmail.com',
                'password'  => bcrypt('password')
            ]
        );
        User::factory()->create(
            [
                'name'  => 'jill valentine',
                'email' => 'jill@gmail.com',
                'password'  => bcrypt('password')
            ]
        );
        User::factory()->create(
            [
                'name'  => 'chris redfield',
                'email' => 'chris@gmail.com',
                'password'  => bcrypt('password')
            ]
        );
    }
}
