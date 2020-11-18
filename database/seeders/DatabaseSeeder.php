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
        User::factory()->count(3)->create(
        	// [
        	// 	'name' => 'aditya',
        	// 	'email' => 'aditya@aditya.com',
        	// ]
        ); // 3 merupakan banyaknya data yang akan di masukkan
    }
}
