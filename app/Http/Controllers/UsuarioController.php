<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
{
    $usuarios = \App\Models\Usuario::all();

    if ($usuarios->isEmpty()) {
        return response('Nenhum usuário encontrado');
    }

    return view('usuarios.index', compact('usuarios'));
}

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6',
            'telefone' => 'nullable|string|max:20',
        ]);

        $validated['senha'] = bcrypt($validated['senha']);

        Usuario::create($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'senha' => 'nullable|string|min:6',
            'telefone' => 'nullable|string|max:20',
        ]);

        if (!empty($validated['senha'])) {
            $validated['senha'] = bcrypt($validated['senha']);
        } else {
            unset($validated['senha']);
        }

        $usuario->update($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário deletado com sucesso!');
    }

    public function show($id)
    {
        $usuario = Usuario::with('pedidos.comida')->findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    
}
