<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use Illuminate\Http\Request;

class BebidaController extends Controller
{
    // Lista todas as bebidas
    public function index()
    {
        $bebidas = Bebida::all();
        return view('bebidas.index', compact('bebidas'));
    }

    // Exibe o formulário de cadastro de bebidas
    public function create()
    {
        return view('bebidas.create');
    }

    // Salva a bebida no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric'
        ]);

        Bebida::create($request->only('nome', 'preco'));

        // Redireciona para a página inicial após cadastro
        return redirect()->route('home')->with('success', 'Bebida cadastrada com sucesso!');
    }

    // Exibe o formulário de edição de bebida
    public function edit(Bebida $bebida)
    {
        return view('bebidas.edit', compact('bebida'));
    }

    // Atualiza os dados da bebida
    public function update(Request $request, Bebida $bebida)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric'
        ]);

        $bebida->update($request->only('nome', 'preco'));

        // Redireciona para a página inicial após atualização
        return redirect()->route('home')->with('success', 'Bebida atualizada com sucesso!');
    }

    // Remove a bebida
    public function destroy(Bebida $bebida)
    {
        $bebida->delete();

        // Redireciona para a página inicial após exclusão
        return redirect()->route('home')->with('success', 'Bebida excluída com sucesso!');
    }

    // Página de confirmação de exclusão
    public function confirmDelete($id)
    {
        $bebida = Bebida::findOrFail($id);
        return view('bebidas.confirm-delete', compact('bebida'));
    }
}
