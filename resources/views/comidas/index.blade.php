<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Comidas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h1>Gerenciar Comidas</h1>
        <a href="{{ route('comidas.create') }}" class="btn btn-primary mb-4">Cadastrar Nova Comida</a>
        
        <!-- Lista de comidas -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comidas as $comida)
                    <tr>
                        <td>{{ $comida->nome }}</td>
                        <td>{{ $comida->descricao }}</td>
                        <td>{{ $comida->preco }}</td>
                        <td>
                            <a href="{{ route('comidas.edit', $comida->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-comida-id="{{ $comida->id }}" data-comida-nome="{{ $comida->nome }}">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir a comida "<span id="comidaNome"></span>"?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Para o Modal de Excluir
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Botão que abriu o modal
            var comidaId = button.getAttribute('data-comida-id');
            var comidaNome = button.getAttribute('data-comida-nome');

            var modalComidaNome = deleteModal.querySelector('#comidaNome');
            modalComidaNome.textContent = comidaNome;

            var form = deleteModal.querySelector('#deleteForm');
            form.action = '/comidas/' + comidaId; // Atualiza a rota de exclusão
        });
    </script>

</body>
</html>
