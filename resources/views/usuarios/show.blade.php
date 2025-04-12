<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detalhes</title>
</head>
<body>
    <h2>Detalhes do Usuário</h2>

    <p>ID: {{ $usuario->id }}</p>
    <p>Nome: {{ $usuario->nome }}</p>
    <p>Email: {{ $usuario->email }}</p>

    <a href="{{ route('usuarios.index') }}">Voltar para lista</a>
</body>
</html>
