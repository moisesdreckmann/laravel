<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;

class ComidaController extends Controller
{
    public function index()
{
    $comidas = Comida::all();
    $usuarios = \App\Models\Usuario::all(); // adicione isso se for realmente necessário na view

    return view('comidas.index', compact('comidas', 'usuarios'));
}

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
        ]);

        Comida::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
        ]);

        return redirect()->route('comidas.index')->with('success', 'Comida criada com sucesso!');
    }

    // Você pode adicionar outros métodos (create, edit, update, destroy) aqui
}
