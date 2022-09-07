<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\RoomFacility;
use App\Models\PublicFacility;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        RoomFacility::factory(10)->create();
        
        PublicFacility::factory(50)->create();
        
        User::create([
            'name' => 'Sabrina Putri',
            'role' => 'admin',
            'username' => 'sabrina',
            'email' => 'sabrina@gmail.com',
            'password' => bcrypt('password')
        ]);

    }
}
