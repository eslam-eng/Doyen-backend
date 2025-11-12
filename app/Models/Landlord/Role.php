<?php

namespace App\Models\Landlord;

use App\Enum\ActivationStatusEnum;
use Stancl\Tenancy\Database\Concerns\CentralConnection;

class Role extends \Spatie\Permission\Models\Role
{
    use CentralConnection;

    protected $fillable = ['name', 'guard_name', 'is_active', 'description'];

    protected $table = 'roles';

    protected $casts = [
        'is_active' => ActivationStatusEnum::class,
    ];
}
