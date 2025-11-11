<?php

use App\Exceptions\ApiExceptionHandler;
use App\Vendor\Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            $centralDomains = config('tenancy.central_domains');

            Route::middleware([
                'tenant',
                'api',
                InitializeTenancyByPath::class,
                PreventAccessFromCentralDomains::class,
            ])
                ->prefix('api/{tenant}')
                ->group(base_path('routes/api/tenant.php'));

            // Web routes
            foreach ($centralDomains as $domain) {
                Route::middleware('api')
                    ->domain($domain)
                    ->prefix('api/landlord')
                    ->group(base_path('routes/api/landlord.php'));

                Route::middleware('web')
                    ->domain($domain)
                    ->group(base_path('routes/web.php'));
            }


        },
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Exception $e, Request $request) {
            return ApiExceptionHandler::handle($e, $request);
        });
    })->create();
