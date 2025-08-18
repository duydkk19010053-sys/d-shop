<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'manage_users',
            'manage_products',
            'manage_orders',
            'manage_categories',
            'manage_contacts',
        ];

        foreach ($permissions as $permission) {
            \App\Models\Permission::create(['name' => $permission]);
        }
    }
}
