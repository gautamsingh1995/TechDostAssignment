<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRolePermission
{
    public function handle(Request $request, Closure $next, $role = null, $permission = null): Response
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // Check Role
        if ($role && !$user->hasRole($role)) {
            abort(403, 'Access denied. Role mismatch.');
        }

        // Check Permission
        if ($permission && !$user->hasPermissionTo($permission)) {
            abort(403, 'Access denied. Permission missing.');
        }

        return $next($request);
    }
}

