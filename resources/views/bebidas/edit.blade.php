@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Bebida</h1>

    <form action="{{ route('bebidas.update', $bebida->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $bebida->nome }}" required>
        </div>

        <div class="mb-3">
            <label>Preço</label>
            <input type="number" step="0.01" name="preco" class="form-control" value="{{ $bebida->preco }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('bebidas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
