@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Comidas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('comidas.create') }}" class="btn btn-primary mb-3">
        Nova Comida
    </a>

    @if($comidas->isEmpty())
        <p>Não há comidas cadastradas.</p>
    @else
        <ul class="list-group">
            @foreach ($comidas as $comida)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>{{ $comida->nome }}</strong> - R$ {{ number_format($comida->preco, 2, ',', '.') }}

                    <div class="d-flex">
                        <a href="{{ route('comidas.edit', $comida->id) }}" class="btn btn-warning btn-sm me-2">
                            Editar
                        </a>

                        <form action="{{ route('comidas.destroy', $comida->id) }}" method="POST" class="form-deletar" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Excluir
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>

{{-- Script para confirmação de exclusão --}}
<script>
    const forms = document.querySelectorAll('.form-deletar');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Tem certeza que deseja excluir esta comida?')) {
                e.preventDefault(); // Cancela o envio do form
            }
        });
    });
</script>
@endsection
