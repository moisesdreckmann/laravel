<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LancheController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\PedidoController;


// Página inicial
Route::get('/', [LancheController::class, 'index'])->name('home');

// CRUD Usuários
Route::resource('usuarios', UsuarioController::class);

// CRUD Comidas
Route::resource('comidas', ComidaController::class);

// CRUD Bebidas
Route::resource('bebidas', BebidaController::class);

// Pedidos
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');

// Pedidos por usuário
Route::get('usuarios/{usuario}/pedidos', [PedidoController::class, 'pedidosPorUsuario'])
    ->name('usuarios.pedidos');

// Detalhes do usuário (se precisar)
Route::get('usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');

// Rotas para comprar comida
Route::get('/usuarios/{usuario_id}/comidas/{comida_id}/comprar', [PedidoController::class, 'comprarComida'])->name('comprar.comida');
Route::post('/comprar', [PedidoController::class, 'comprar'])->name('comprar.comida');
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
