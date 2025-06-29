<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Pedidos de {{ $usuario->nome }} - Sistema de Lanches</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container py-5">

    <h1 class="mb-4">Pedidos de <strong>{{ $usuario->nome }}</strong></h1>

    @if($usuario->pedidos->isEmpty())
        <div class="alert alert-info">
            Este usuário ainda não fez nenhum pedido.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Comida</th>
                        <th>Quantidade</th>
                        <th>Status</th>
                        <th>Data do Pedido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuario->pedidos as $pedido)
                    <tr>
                        <td>Pedido #{{ $pedido->id }}</td>
                        <td>{{ $pedido->comida->nome ?? 'Sem comida' }}</td>
                        <td>{{ $pedido->quantidade ?? 'N/D' }}</td>
                        <td>
                            <span class="badge
                                @if($pedido->status === 'pendente') bg-warning text-dark
                                @elseif($pedido->status === 'concluído') bg-success
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($pedido->status) }}
                            </span>
                        </td>
                        <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-3">← Voltar para lista de usuários</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
