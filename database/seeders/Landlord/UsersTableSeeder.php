<?php

namespace Database\Seeders\Landlord;

use App\Models\Landlord\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create();
    }
}
