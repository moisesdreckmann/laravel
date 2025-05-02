<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario; // Alterado para o modelo Usuario

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(Usuario::all(), 200); // Usando o modelo Usuario
    }

    public function show(Usuario $usuario) // Alterado para Usuario
    {
        return response()->json($usuario, 200); // Usando o modelo Usuario
    }
}
