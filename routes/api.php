<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('jwt.verify')->get('/v1/index', function(Request $request) {
    $user = $request->attributes->get('jwt_user');

    return response()->json([
        'message' => 'Access granted',
        'user' => $user
    ]);
});


Route::middleware(['jwt.verify', 'role.only:superadmin'])->group(function () {
    Route::get('/v1/inventory', [InventoryController::class, 'index']);
});
