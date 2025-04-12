<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;
use App\Models\Bebida;

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
    
        return redirect()->route('home')->with('success', 'Comida cadastrada com sucesso!');
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
        $comida->nome = $request->nome;
        $comida->preco = $request->preco;
        $comida->save();

        return redirect()->route('home')->with('success', 'Comida atualizada com sucesso!');
    }

    // Método destroy para deletar uma comida
    

    public function index3()
    {
        $bebidas = Bebida::all();
        return view('bebidas.index', compact('bebidas'));
    }

    public function index4()
    {
        $comidas = Comida::all();
        return view('comidas.index', compact('comidas'));
    }

    // Mostra a página de confirmação
// Mostrar página de confirmação
// Novo método
public function confirmDelete($id)
{
    $comida = Comida::findOrFail($id);
    return view('comidas.confirm-delete', compact('comida'));
}
// Destroy continua igual
public function destroy($id)
{
    $comida = Comida::findOrFail($id);
    $comida->delete();

    return redirect()->route('home')->with('success', 'Comida deletada com sucesso!');
}




}
