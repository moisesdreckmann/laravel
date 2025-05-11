<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comida;
use Illuminate\Http\Request;

class ComidaController extends Controller
{
    public function index()
    {
        return response()->json(Comida::all());
    }

    public function show($id)
    {
        $comida = Comida::find($id);

        if (!$comida) {
            return response()->json(['message' => 'Comida não encontrada'], 404);
        }

        return response()->json($comida);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0'
        ]);

        try {
            $comida = Comida::create($validated);
            return response()->json($comida, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar comida', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $comida = Comida::find($id);

        if (!$comida) {
            return response()->json(['message' => 'Comida não encontrada'], 404);
        }

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0'
        ]);

        try {
            $comida->update($validated);
            return response()->json($comida);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar comida', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $comida = Comida::find($id);

        if (!$comida) {
            return response()->json(['message' => 'Comida não encontrada'], 404);
        }

        try {
            $comida->delete();
            return response()->json(['message' => 'Comida deletada com sucesso']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao deletar comida', 'error' => $e->getMessage()], 500);
        }
    }
}
