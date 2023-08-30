<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('web_settings')->insert([
            'id' => '1',
            'web_name' => 'iMaster',
            'web_logo' => '/logo/default.png',
            'web_dev'  => 'Ifeta Developer Team',
        ]);
    }
}
