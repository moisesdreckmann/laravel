<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bebida;

class BebidaController extends Controller
{
    public function index()
    {
        return response()->json(Bebida::all(), 200);
    }

    public function show(Bebida $bebida)
    {
        return response()->json($bebida, 200);
    }
}
