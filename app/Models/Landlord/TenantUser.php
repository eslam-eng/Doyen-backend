<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\CentralConnection;

class TenantUser extends Model
{
    use CentralConnection;
}
