<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(Usuario::all(), 200);
    }

    public function show(Usuario $usuario)
    {
        return response()->json($usuario, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6',
            'telefone' => 'nullable|string|max:20'
        ]);

        try {
            // Criptografar a senha antes de salvar
            $validated['senha'] = bcrypt($validated['senha']);
            $usuario = Usuario::create($validated);
            return response()->json($usuario, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar usuário', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'senha' => 'nullable|string|min:6',
            'telefone' => 'nullable|string|max:20'
        ]);

        try {
            if (isset($validated['senha'])) {
                $validated['senha'] = bcrypt($validated['senha']);
            } else {
                unset($validated['senha']); // Não atualiza a senha se não for enviada
            }

            $usuario->update($validated);
            return response()->json($usuario, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar usuário', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        try {
            $usuario->delete();
            return response()->json(['message' => 'Usuário deletado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao deletar usuário', 'error' => $e->getMessage()], 500);
        }
    }
}
