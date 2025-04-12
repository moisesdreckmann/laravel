@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Comida</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comidas.update', $comida->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ $comida->nome }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço:</label>
            <input type="text" name="preco" class="form-control" value="{{ $comida->preco }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('comidas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
