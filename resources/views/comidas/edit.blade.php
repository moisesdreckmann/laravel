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
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $comida->nome) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço:</label>
            <input type="text" name="preco" class="form-control" value="{{ old('preco', $comida->preco) }}" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="tem_bebida_gratis" name="tem_bebida_gratis" value="1" 
                {{ old('tem_bebida_gratis', $comida->tem_bebida_gratis) ? 'checked' : '' }}>
            <label class="form-check-label" for="tem_bebida_gratis">Esta comida dá direito a uma bebida grátis 🥤</label>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('comidas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
