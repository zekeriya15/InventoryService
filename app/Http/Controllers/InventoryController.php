<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'u are superadmin'
        ]);
    }
}
