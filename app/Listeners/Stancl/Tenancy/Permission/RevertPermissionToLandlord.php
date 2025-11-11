<?php

namespace App\Listeners\Stancl\Tenancy\Permission;

use App\Models\Landlord\Role;
use Spatie\Permission\PermissionRegistrar;
use Stancl\Tenancy\Events\TenancyEnded;

class RevertPermissionToLandlord
{

    /**
     * Handle the event.
     */
    public function handle(TenancyEnded $event): void
    {
        $permissionRegistrar = app(PermissionRegistrar::class);

        // Revert back to central Role model
        $permissionRegistrar->setRoleClass(Role::class);

        // Reset cache key to default
        $permissionRegistrar->cacheKey = 'spatie.permission.cache';
    }
}
