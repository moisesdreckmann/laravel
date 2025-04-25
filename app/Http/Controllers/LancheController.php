<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;
use App\Models\Bebida;
use App\Models\Usuario;

class LancheController extends Controller  // Certifique-se de estender a classe 'Controller' corretamente
{
    public function index()
    {
        // Recupera todos os registros dos modelos
        $comidas = Comida::all();
        $bebidas = Bebida::all();
        $usuarios = Usuario::all();

        // Retorna a view passando as variáveis 'comidas', 'bebidas' e 'usuarios'
        return view('index', compact('comidas', 'bebidas', 'usuarios'));
    }
}
