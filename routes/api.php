<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('jwt.verify')->get('/v1/inventory', function(Request $request) {
    $user = $request->attributes->get('jwt_user');

    return response()->json([
        'message' => 'Access granted',
        'user' => $user
    ]);
});
