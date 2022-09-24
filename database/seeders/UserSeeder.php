<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // Admin
        DB::table('users')->insert([
            'name' => 'Ninh Nguyen',
            'email' => 'admin@thebigdev.com',
            'password' => Hash::make('123456'),
            'role' => 1,
        ]);

        // Test account
        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@thebigdev.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
