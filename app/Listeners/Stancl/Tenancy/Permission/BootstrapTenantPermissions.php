<?php

namespace App\Listeners\Stancl\Tenancy\Permission;

use App\Models\Tenant\Role;
use Spatie\Permission\PermissionRegistrar;
use Stancl\Tenancy\Events\TenancyBootstrapped;

class BootstrapTenantPermissions
{
    public function handle(TenancyBootstrapped $event): void
    {
        $permissionRegistrar = app(PermissionRegistrar::class);

        // Use tenant Role model
        $permissionRegistrar->setRoleClass(Role::class);

        // Tenant-specific cache key
        $permissionRegistrar->cacheKey = 'spatie.permission.cache.tenant.' . $event->tenancy->tenant->getTenantKey();
    }
}
