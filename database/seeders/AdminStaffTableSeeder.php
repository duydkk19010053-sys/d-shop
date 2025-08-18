<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User1',
            'email' => 'admin1@example.com',
            'password' => bcrypt('password'),
            'phone_number' => '1234567890', 
            'status' => 'active',
            'avatar' => '',
            'address' => '123 Ha Noi, Vietnam',
            'role_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'staff User1',
            'email' => 'staff1@example.com',
            'password' => bcrypt('password'),
            'phone_number' => '1234567890', 
            'status' => 'active',
            'avatar' => '',
            'address' => '123 Ha Noi, Vietnam',
            'role_id' => 2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
