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
            'tenancy_db_name' => 'tenant_test', // optional, let package generate name
        ]);
        $tenant->domains()->create(['domain' => $tenant->slug]);
    }
}
