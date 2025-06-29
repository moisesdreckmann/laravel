
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($usuario) ? 'Editar Usuário' : 'Criar Usuário' }}</h1>

    <form action="{{ isset($usuario) ? route('usuarios.update', $usuario->id) : route('usuarios.store') }}" method="POST">
        @csrf
        @if(isset($usuario))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input
                type="text"
                name="nome"
                id="nome"
                class="form-control @error('nome') is-invalid @enderror"
                value="{{ old('nome', $usuario->nome ?? '') }}"
                required
            >
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $usuario->email ?? '') }}"
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input
                type="text"
                name="telefone"
                id="telefone"
                class="form-control @error('telefone') is-invalid @enderror"
                value="{{ old('telefone', $usuario->telefone ?? '') }}"
            >
            @error('telefone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">
                {{ isset($usuario) ? 'Senha (deixe em branco para não alterar)' : 'Senha' }}
            </label>
            <input
                type="password"
                name="senha"
                id="senha"
                class="form-control @error('senha') is-invalid @enderror"
                {{ isset($usuario) ? '' : 'required' }}
            >
            @error('senha')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($usuario) ? 'Atualizar Usuário' : 'Criar Usuário' }}
        </button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
