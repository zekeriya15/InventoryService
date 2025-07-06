<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Unauthorized'
            ], 401);
        }

        try {
            $jwtKey = new Key(env('JWT_SECRET'), 'HS256');
            $decode = JWT::decode($token, $jwtKey);

            // store payload in the request for use in controllers
            $request->attributes->add(['jwt_user' => (array) $decode]);

        } catch(Exception $e) {
            return response()->json([
                'status' => 'Error',
                'message' => $e->getMessage()
            ], 401);
        }

        return $next($request);
    }
}