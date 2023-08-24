<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Saya Bukan Admin',
            'email' => 'sayabukanadmin@example.com',
            'image' => 'default.png',
            'phone' => '089612345678',
            'password' => Hash::make('Namikaze1'),
            'position_id' => '1',
        ]);
        DB::table('users')->insert([
            'id' => '2',
            'name' => 'Super Administrator',
            'email' => 'superadmin@example.com',
            'image' => 'default.png',
            'phone' => '089612345678',
            'password' => Hash::make('Namikaze1'),
            'position_id' => '2',
        ]);
    }
}
