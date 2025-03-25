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
        $manager = Role::create(['name' => 'Manager']);
        $employee = Role::create(['name' => 'Employee']);
        $manager->givePermissionTo([
            'create-product',
            'edit-product',
            'delete-product',
            'create-stockin',
            'edit-stockin',
            'delete-stockin',
            'create-stockout',
            'edit-stockout',
            'delete-stockout',
        ]);
        $employee->givePermissionTo([
            'create-product',
            'edit-product',
            'delete-product',
            'edit-stockin',
            'edit-stockout'
        ]);
    }
}
