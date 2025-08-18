<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = \App\Models\Role::where('name', 'admin')->first();
        $staffRole = \App\Models\Role::where('name', 'staff')->first();

        $prermissions = \App\Models\Permission::all();
        // Adnin all permissions
        $adminRole->permissions()->sync($prermissions);
        // Staff some permissions
        $staffPermissions = $prermissions->whereIn('name', [
            'manage_products',
            'manage_contacts',
        ]);
        $staffRole->permissions()->sync($staffPermissions); 
    }
}
