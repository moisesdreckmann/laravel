<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LancheController;

// Página inicial redireciona para a view principal (index geral)
Route::get('/', [LancheController::class, 'index']);

// =========================
// ROTAS DE USUÁRIOS
// =========================
Route::resource('usuarios', UsuarioController::class);

// =========================
// ROTAS DE COMIDAS
// =========================
Route::resource('comidas', ComidaController::class);

// =========================
// ROTAS DE BEBIDAS
// =========================
Route::resource('bebidas', BebidaController::class);
