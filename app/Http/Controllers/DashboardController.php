<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;
use App\Models\Bebida;
use App\Models\Usuario;

class DashboardController extends Controller
{
    public function index()
    {
        $comidas = Comida::all();
        $bebidas = Bebida::all();
        $usuarios = Usuario::all();

        return view('dashboard', compact('comidas', 'bebidas', 'usuarios'));
    }
}
