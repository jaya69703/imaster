<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
            'id' => '1',
            'name' => 'Pengunjung Situs',
            'code' => 'VST',
            'sallary' => '0',
        ]);

        DB::table('positions')->insert([
            'id' => '2',
            'name' => 'Web Developer',
            'code' => 'WEB',
            'sallary' => '3000000',
        ]);
    }
}
