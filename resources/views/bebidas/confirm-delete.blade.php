<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Exclusão</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h1>Confirmar Exclusão</h1>

        <p>Tem certeza que deseja excluir a bebida "{{ $bebida->nome }}"?</p>

        <!-- Formulário de confirmação -->
        <form action="{{ route('bebidas.destroy', $bebida->id) }}" method="POST">
            @csrf
            @method('DELETE')
            
            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Excluir</button>
                <a href="{{ route('bebidas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

</body>
</html>
