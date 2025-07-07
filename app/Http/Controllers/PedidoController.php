<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Comida;

class PedidoController extends Controller
{
    public function comprar(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'comida_id' => 'required|exists:comidas,id',
        ]);

        // ✅ Buscar a comida
        $comida = Comida::findOrFail($request->comida_id);

        // ✅ Usar o valor real da comida
        Pedido::create([
            'usuario_id' => $request->usuario_id,
            'comida_id' => $comida->id,
            'bebida_gratis' => $comida->tem_bebida_gratis ? 1 : 0,
        ]);

        return back()->with('success', 'Pedido realizado com sucesso!');
    }

    public function index()
    {
        $pedidos = Pedido::with(['usuario', 'comida'])->get();
        return view('pedidos.index', compact('pedidos'));
    }
}
