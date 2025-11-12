<?php

namespace Database\Seeders\Landlord;

use App\Models\Landlord\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $tenant = Tenant::create([
            'id' => (string)\Str::uuid(),
            'slug' => 'test',
        ]);
        $tenant->domains()->create(['domain' => $tenant->slug]);
    }
}
