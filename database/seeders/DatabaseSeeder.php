<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Client;
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
        City::factory(10)
            ->hasClients(8)
            ->create();
    }
}
