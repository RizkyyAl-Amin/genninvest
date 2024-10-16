<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin'),
            ],
            [
                'role_id' => 2,
                'name' => 'User',
                'email' => 'user@mail.com',
                'password' => Hash::make('user'),
            ],
            [
                'role_id' => 2,
                'name' => 'User1',
                'email' => 'user1@mail.com',
                'password' => Hash::make('user'),
            ],
            [
                'role_id' => 2,
                'name' => 'User2',
                'email' => 'user2@mail.com',
                'password' => Hash::make('user'),
            ],
            [
                'role_id' => 2,
                'name' => 'User3',
                'email' => 'user3@mail.com',
                'password' => Hash::make('user'),
            ],
        ]);
    }
}
