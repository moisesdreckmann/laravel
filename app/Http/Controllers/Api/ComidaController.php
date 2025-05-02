<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comida;
use Illuminate\Http\Request;

class ComidaController extends Controller
{
    public function index() {
        return response()->json(Comida::all());
    }

    public function show($id) {
        $comida = Comida::find($id);

        if (!$comida) {
            return response()->json(['message' => 'Comida não encontrada'], 404);
        }

        return response()->json($comida);
    }
}
