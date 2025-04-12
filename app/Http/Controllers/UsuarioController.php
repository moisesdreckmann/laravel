<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Comida;
use App\Models\Bebida;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Página inicial trazendo tudo
    public function index()
    {
        $comidas = Comida::all();
        $bebidas = Bebida::all();
        $usuarios = Usuario::all();

        return view('welcome', compact('comidas', 'bebidas', 'usuarios'));
    }

    // Tela de cadastro do usuário
    public function create()
    {
        return view('usuarios.create');
    }

    // Salvar usuário no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome'  => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6',
        ]);

        Usuario::create([
            'nome'  => $request->nome,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
        ]);

        return redirect()->route('home')->with('success', 'Usuário cadastrado com sucesso!');
    }

    // Mostrar detalhes de um usuário
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    // Tela de edição do usuário
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    // Atualizar o usuário
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('home')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Excluir usuário
    public function destroy($id)
    {
        // Encontre o usuário pelo id
        $usuario = Usuario::findOrFail($id);

        // Exclua o usuário
        $usuario->delete();

        // Redirecione para a página inicial com uma mensagem de sucesso
        return redirect()->route('home')->with('success', 'Usuário excluído com sucesso!');
    }
}
