<?php

namespace App\Vendor\Stancl\Tenancy\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Stancl\Tenancy\Exceptions\RouteIsMissingTenantParameterException;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath as BaseInitializeTenancyByPath;

class InitializeTenancyByPath extends BaseInitializeTenancyByPath
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     *
     * @throws RouteIsMissingTenantParameterException
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var Route $route */
        $route = $request->route();

        // Check that our route actually includes the tenant parameter
        $parameterNames = $route->parameterNames();

        // We want to allow it even if the tenant is NOT the *first* parameter
        if (in_array('tenant', $parameterNames)) {
            return $this->initializeTenancy($request, $next, $route);
        }

        throw new RouteIsMissingTenantParameterException;
    }
}
