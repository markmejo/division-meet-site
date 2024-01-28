<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('municipalities')->insert([
            ['name' => 'Carmen'],
            ['name' => 'Nasipit'],
            ['name' => 'Kitcharao'],
            ['name' => 'Buenavista'],
            ['name' => 'RTR'],
            ['name' => 'Tubay'],
            ['name' => 'Santiago'],
            ['name' => 'Jabonga'],
            ['name' => 'Magallanes'],
            ['name' => 'Las Nieves'],
        ]);
    }
}
