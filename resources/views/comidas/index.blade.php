@extends('layouts.app') {{-- Caso você tenha um layout geral --}}

@section('content')
    <h1>Lista de Comidas</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('comidas.create') }}">Adicionar Nova Comida</a>

    <ul>
        @foreach ($comidas as $comida)
            <li>
                {{ $comida->nome }} - R$ {{ $comida->preco }}
                <a href="{{ route('comidas.edit', $comida->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
@endsection
