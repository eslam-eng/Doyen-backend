<?php

namespace App\Models\Tenant;

use App\Enum\ActivationStatusEnum;

class Role extends \Spatie\Permission\Models\Role
{
    protected $fillable = ['name', 'guard_name', 'is_active', 'description'];

    protected $table = 'roles';

    protected $casts = [
        'is_active' => ActivationStatusEnum::class,
    ];
}
