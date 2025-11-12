<?php

namespace Database\Seeders;

use Database\Seeders\Tenant\UsersTableSeeder;
use Illuminate\Database\Seeder;

class TenantDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
    }
}
