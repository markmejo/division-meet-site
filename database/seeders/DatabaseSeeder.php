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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $makeUserCommand = new MakeUserCommand();
        $reflector = new \ReflectionObject($makeUserCommand);

        $getUserModel = $reflector->getMethod('getUserModel');
        $getUserModel->setAccessible(true);
        $getUserModel->invoke($makeUserCommand)::create([
            'name' => 'Administrator',
            'email' => env('FILAMENT_USER_EMAIL', 'Administrator'),
            'password' => Hash::make(env('FILAMENT_USER_PASSWORD', 'password')),
        ]);

        $this->call([
            MunicipalitySeeder::class,
        ]);
    }
}
