@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Bebida 🥤</h1>

    <form action="{{ route('bebidas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nome da Bebida</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Preço</label>
            <input type="number" name="preco" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('bebidas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
