<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
            'phone_number' => '1234567890', 
            'status' => 'pending',
            'avatar' => '',
            'address' => '123 Ha Noi, Vietnam',
            'role_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => bcrypt('password123'),
            'phone_number' => '1234567890', 
            'status' => 'pending',
            'avatar' => '',
            'address' => '123 Ho Chi Minh, Vietnam',
            'role_id' => 2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'User 3',
            'email' => 'user3@example.com',
            'password' => bcrypt('password'),
            'phone_number' => '1234567890', 
            'status' => 'pending',
            'avatar' => '',
            'address' => '123 Da Lat, Vietnam',
            'role_id' => 3, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
