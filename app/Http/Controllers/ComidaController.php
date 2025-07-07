<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;

class ComidaController extends Controller
{
    public function index()
    {
        $comidas = Comida::all();
        $usuarios = \App\Models\Usuario::all();

        return view('comidas.index', compact('comidas', 'usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'tem_bebida_gratis' => 'sometimes|boolean',
        ]);

        $data['tem_bebida_gratis'] = $request->has('tem_bebida_gratis');

        Comida::create($data);

        return redirect()->route('comidas.index')->with('success', 'Comida criada com sucesso!');
    }

    public function edit(Comida $comida)
    {
        return view('comidas.edit', compact('comida'));
    }

    public function update(Request $request, Comida $comida)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'tem_bebida_gratis' => 'sometimes|boolean',
        ]);

        $data['tem_bebida_gratis'] = $request->has('tem_bebida_gratis');

        $comida->update($data);

        return redirect()->route('comidas.index')->with('success', 'Comida atualizada com sucesso!');
    }

    // Você pode adicionar destroy, create, etc., se quiser
}

