<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\UsuarioController;

// Página inicial vai direto para listagem de usuários
Route::get('/', [UsuarioController::class, 'index'])->name('home');

// Rotas para usuários (geralmente já vem com resource)
Route::resource('usuarios', UsuarioController::class);

// Rota para excluir um usuário (DELETE)
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

// Rota de confirmação de exclusão de usuário
Route::get('/usuarios/{id}/confirm-delete', [UsuarioController::class, 'confirmDelete'])->name('usuarios.confirmDelete');

// Rotas para comidas
Route::resource('comidas', ComidaController::class);

// Rota para excluir uma comida (DELETE)
Route::delete('/comidas/{id}', [ComidaController::class, 'destroy'])->name('comidas.destroy');

// Rota de confirmação de exclusão de comida
Route::get('/comidas/{id}/confirm-delete', [ComidaController::class, 'confirmDelete'])->name('comidas.confirmDelete');

// Rotas para bebidas
Route::resource('bebidas', BebidaController::class);
// Rota para excluir uma bebida (DELETE)
Route::delete('/bebidas/{id}', [BebidaController::class, 'destroy'])->name('bebidas.destroy');

// Rota de confirmação de exclusão de bebida
Route::get('/bebidas/{id}/confirm-delete', [BebidaController::class, 'confirmDelete'])->name('bebidas.confirmDelete');

?>
