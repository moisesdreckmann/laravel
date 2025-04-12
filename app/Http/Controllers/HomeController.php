<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;
use App\Models\Bebida;
use App\Models\Usuario;

class HomeController extends Controller
{
    /**
     * Exibe a página inicial com os dados de comidas, bebidas e usuários.
     */
    public function index()
    {
        $comidas = Comida::all();
        $bebidas = Bebida::all();
        $usuarios = Usuario::all();

        return view('welcome', compact('comidas', 'bebidas', 'usuarios'));
    }
}

