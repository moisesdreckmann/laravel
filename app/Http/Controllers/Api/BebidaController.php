<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bebida;
use Illuminate\Http\Request;

class BebidaController extends Controller
{
    public function index()
    {
        return response()->json(Bebida::all(), 200);
    }

    public function show(Bebida $bebida)
    {
        return response()->json($bebida, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0'
        ]);

        try {
            $bebida = Bebida::create($validated);
            return response()->json($bebida, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar bebida', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $bebida = Bebida::find($id);

        if (!$bebida) {
            return response()->json(['message' => 'Bebida não encontrada'], 404);
        }

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0'
        ]);

        try {
            $bebida->update($validated);
            return response()->json($bebida, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar bebida', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $bebida = Bebida::find($id);

        if (!$bebida) {
            return response()->json(['message' => 'Bebida não encontrada'], 404);
        }

        try {
            $bebida->delete();
            return response()->json(['message' => 'Bebida deletada com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao deletar bebida', 'error' => $e->getMessage()], 500);
        }
    }
}
