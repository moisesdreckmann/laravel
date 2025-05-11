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
Route::post('comidas', [ComidaController::class, 'store']);
Route::put('comidas/{comida}', [ComidaController::class, 'update']);
Route::delete('comidas/{comida}', [ComidaController::class, 'destroy']);

// Bebidas
Route::get('bebidas', [BebidaController::class, 'index']);
Route::get('bebidas/{bebida}', [BebidaController::class, 'show']);
Route::post('bebidas', [BebidaController::class, 'store']);
Route::put('bebidas/{bebida}', [BebidaController::class, 'update']);
Route::delete('bebidas/{bebida}', [BebidaController::class, 'destroy']);

// Usuários
Route::get('usuarios', [UsuarioController::class, 'index']);
Route::get('usuarios/{id}', [UsuarioController::class, 'show']);
Route::post('usuarios', [UsuarioController::class, 'store']);
Route::put('usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy']);
