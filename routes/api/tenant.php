<?php

declare(strict_types=1);

use App\Models\Tenant\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::get('/users', function () {
    // This will automatically use the tenant database
    return User::all();
});
