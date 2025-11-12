<?php

namespace Database\Seeders\Landlord;

use App\Models\Landlord\Tenant;
use App\Models\Landlord\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        if (!$this->checkIfDatabaseExists($tenant->tenancy_db_name)){
            event(new \Stancl\Tenancy\Events\TenantCreated($tenant));
        }
    }

    private function checkIfDatabaseExists($databaseName)
    {
        $result = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$databaseName]);
        return count($result) > 0;
    }
}
