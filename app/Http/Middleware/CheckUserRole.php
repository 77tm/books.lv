<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        // Retrieve the authenticated user
        $user = $request->user();

        // Check if the user is an admin
        if ($user && $user->role == 1) {
            return $next($request);
        }

        // Handle unauthorized access
        abort(403, 'Unauthorized.');
    }
}
