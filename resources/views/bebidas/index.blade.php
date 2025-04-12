{{-- resources/views/bebidas/index.blade.php --}}

@extends('layouts.app') {{-- Caso você tenha um layout geral --}}

@section('content')
    <h1>Lista de Bebidas</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('bebidas.create') }}">Adicionar Nova Bebida</a>

    <ul>
        @foreach ($bebidas as $bebida)
            <li>
                {{ $bebida->nome }} - R$ {{ $bebida->preco }}
                <a href="{{ route('bebidas.edit', $bebida->id) }}">Editar</a>
                
                {{-- Formulário para excluir a bebida --}}
                <form action="{{ route('bebidas.destroy', $bebida->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
