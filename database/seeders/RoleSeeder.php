<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin']);
        $admin = Role::create(['name' => 'Manager']);
        $Operator = Role::create(['name' => 'Employee']);
        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-product',
            'edit-product',
            'delete-product'
        ]);
        $Operator->givePermissionTo([
            'create-product',
            'edit-product',
            'delete-product'
        ]);
    }
}
