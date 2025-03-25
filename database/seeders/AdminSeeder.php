<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Admin User
        $Admin = User::create([
            'name' => 'Bibit',
            'email' => 'admin@roles.id',
            'password' => Hash::make('123456')
        ]);
        $Admin->assignRole('Admin');
        // Creating Admin User
        $manager = User::create([
            'name' => 'Sachi',
            'email' => 'manager@roles.id',
            'password' => Hash::make('123456')
        ]);
        $manager->assignRole('Manager');
        // Creating Product Manager User
        $operator = User::create([
            'name' => 'Steffi',
            'email' => 'operator@roles.id',
            'password' => Hash::make('123456')
        ]);
        $operator->assignRole('Operator');
    }
}
