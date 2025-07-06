<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$requiredRoles)
    {
        // payload is php object not array so use -> not []
        $payload = $request->attributes->get('jwt_user');

        if (!$payload || !isset($payload->roles)) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Unauthorized'
            ], 401);
        }

        foreach($requiredRoles as $role) {
            if (in_array($role, $payload->roles)) {
                return $next($request);
            }
        }

        return response()->json([
            'status' => 'Error',
            'message' => 'Insufficient role'
        ], 403);
    }
}