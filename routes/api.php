<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\ComidaController;
use App\Http\Controllers\Api\BebidaController;
use App\Http\Controllers\Api\UsuarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Comidas
Route::get('comidas', [ComidaController::class, 'index']);
Route::get('comidas/{comida}', [ComidaController::class, 'show']);

// Bebidas
Route::get('bebidas', [BebidaController::class, 'index']);
Route::get('bebidas/{bebida}', [BebidaController::class, 'show']);

// Usuários
Route::get('usuarios', [UsuarioController::class, 'index']);
Route::get('usuarios/{id}', [UsuarioController::class, 'show']);
