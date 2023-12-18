<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@mail.ru',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => '1',
            ],
            //instructor
            [
                'name' => 'Instructor',
                'username' => 'instructor',
                'email' => 'instructor@mail.ru',
                'password' => Hash::make('111'),
                'role' => 'instructor',
                'status' => '1',
            ],
            //user
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@mail.ru',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => '1',
            ],
        ]);
    }
}
