<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Pedidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>
<body class="bg-light p-5">
    <div class="container">
        <h1 class="mb-4">Todos os Pedidos</h1>

        <a href="{{ route('home') }}" class="btn btn-secondary mb-3">🏠 Voltar para Home</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#ID</th>
                    <th>Usuário</th>
                    <th>Comida</th>
                    <th>Bebida Grátis?</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->usuario->nome ?? 'N/A' }}</td>
                        <td>{{ $pedido->comida->nome ?? 'N/A' }}</td>
                        <td>
                            @if(!!$pedido->bebida_gratis)
                                <span class="text-success fw-bold">Sim</span>
                            @else
                                <span class="text-danger">Não</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum pedido encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
