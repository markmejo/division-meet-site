<?php

namespace Database\Seeders;

use Filament\Commands\MakeUserCommand;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => env('FILAMENT_USER_NAME', 'Test User'),
            'email' => env('FILAMENT_USER_EMAIL', 'test@example.com'),
            'password' => Hash::make(env('FILAMENT_USER_PASSWORD', 'password')),
        ]);

        $this->call([
            MunicipalitySeeder::class,
        ]);
    }
}
