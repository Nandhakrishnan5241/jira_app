<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Team Lead',
            'email' => 'teamlead@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'team_lead',
        ]);

        User::create([
            'name' => 'Employee1',
            'email' => 'employee1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'employee',
        ]);
        User::create([
            'name' => 'Employee2',
            'email' => 'employee2@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'employee',
        ]);
    }
}