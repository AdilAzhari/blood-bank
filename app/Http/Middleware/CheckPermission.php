<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route()->getName();

        $permissions = Permission::whereRaw("FIND_IN_SET('$route', `routes`)")->get();

        if (!$permissions) {
            return response()->view('errors.403');
        }
        return $next($request);
        // return $permissions;
        // dd($route, $permissions);
    }
}
