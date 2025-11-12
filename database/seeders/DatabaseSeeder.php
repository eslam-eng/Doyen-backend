<?php

namespace Database\Seeders;

use Database\Seeders\Landlord\TenantsTableSeeder;
use Database\Seeders\Landlord\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TenantsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
