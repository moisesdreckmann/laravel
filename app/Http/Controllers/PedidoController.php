<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Usuario;

class PedidoController extends Controller
{
    public function comprar(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'comida_id' => 'required|exists:comidas,id',
        ]);

        Pedido::create([
            'usuario_id' => $request->usuario_id,
            'comida_id' => $request->comida_id,
        ]);

        return back()->with('success', 'Pedido realizado com sucesso!');
    }

    public function pedidosPorUsuario(Usuario $usuario)
    {
        $pedidos = Pedido::where('usuario_id', $usuario->id)->get();

        return view('pedidos.index', compact('usuario', 'pedidos'));
    }

    public function index()
{
    $pedidos = \App\Models\Pedido::with(['usuario', 'comida'])->get();

    return view('pedidos.index', compact('pedidos'));
}
}
