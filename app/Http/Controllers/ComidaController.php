<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;

class ComidaController extends Controller
{
    public function index()
    {
        $comidas = Comida::all();
        return view('comidas.index', compact('comidas'));
    }

    public function create()
    {
        return view('comidas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
        ]);

        Comida::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
        ]);

        return redirect()->route('comidas.index')->with('success', 'Comida cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $comida = Comida::findOrFail($id);
        return view('comidas.edit', compact('comida'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
            'preco' => 'required|numeric',
        ]);

        $comida = Comida::findOrFail($id);
        $comida->update([
            'nome' => $request->nome,
            'preco' => $request->preco,
        ]);

        return redirect()->route('comidas.index')->with('success', 'Comida atualizada com sucesso!');
    }

    public function confirmDelete($id)
    {
        $comida = Comida::findOrFail($id);
        return view('comidas.confirm-delete', compact('comida'));
    }

    public function destroy($id)
    {
        $comida = Comida::findOrFail($id);
        $comida->delete();

        return redirect()->route('comidas.index')->with('success', 'Comida deletada com sucesso!');
    }
}
