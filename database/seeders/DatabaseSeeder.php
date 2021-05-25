<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        City::factory(config('serempre.seeds.cities'))
            ->hasClients(config('serempre.seeds.clients'))
            ->create();

        User::create([
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        User::factory(config('serempre.seeds.users'))
            ->create();
    }
}
