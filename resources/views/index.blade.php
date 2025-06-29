<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h1 class="mb-4">Painel Principal 🍔🥤</h1>

        <a href="{{ route('comidas.index') }}" class="btn btn-primary mb-2">Ver Comidas</a>
        <a href="{{ route('bebidas.index') }}" class="btn btn-success mb-2">Ver Bebidas</a>
        <a href="{{ route('usuarios.index') }}" class="btn btn-dark mb-2">Ver Usuários</a>
        <a href="{{ route('pedidos.index') }}" class="btn btn-info mb-2">Ver Pedidos</a>
    </div>
</body>
</html>
