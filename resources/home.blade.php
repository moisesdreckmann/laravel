<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - Sistema de Lanches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light p-5">

<div class="container">
    <h1 class="mb-4">Dashboard do Sistema de Lanches</h1>

    {{-- Se quiser botões para páginas específicas --}}
    <div class="mb-4">
        <a href="{{ route('comidas.index') }}" class="btn btn-primary me-2">Ver Comidas</a>
        <a href="{{ route('bebidas.index') }}" class="btn btn-success me-2">Ver Bebidas</a>
        <a href="{{ route('usuarios.index') }}" class="btn btn-dark">Ver Usuários</a>
    </div>

    {{-- Seções para cada tipo de dado --}}
    <div class="row">
        {{-- Comidas --}}
        <div class="col-md-4">
            <h3>Comidas ({{ $comidas->count() }})</h3>
            @if($comidas->isEmpty())
                <p class="text-muted">Nenhuma comida cadastrada.</p>
            @else
                <ul class="list-group">
                    @foreach($comidas as $comida)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $comida->nome }}
                            <span class="badge bg-primary rounded-pill">R$ {{ number_format($comida->preco, 2, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        {{-- Bebidas --}}
        <div class="col-md-4">
            <h3>Bebidas ({{ $bebidas->count() }})</h3>
            @if($bebidas->isEmpty())
                <p class="text-muted">Nenhuma bebida cadastrada.</p>
            @else
                <ul class="list-group">
                    @foreach($bebidas as $bebida)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $bebida->nome }}
                            <span class="badge bg-success rounded-pill">R$ {{ number_format($bebida->preco, 2, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        {{-- Usuários --}}
        <div class="col-md-4">
            <h3>Usuários ({{ $usuarios->count() }})</h3>
            @if($usuarios->isEmpty())
                <p class="text-muted">Nenhum usuário cadastrado.</p>
            @else
                <ul class="list-group">
                    @foreach($usuarios as $usuario)
                        <li class="list-group-item">
                            <strong>{{ $usuario->nome }}</strong><br />
                            <small>{{ $usuario->email }}</small>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

</div>

</body>
</html>
