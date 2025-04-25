<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Bebidas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Lista de Bebidas</h1>

    <!-- Botão para Adicionar nova bebida -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Adicionar Bebida</button>

    @foreach ($bebidas as $bebida)
        <div class="mb-2">
            <p>{{ $bebida->nome }} - {{ $bebida->preco }}</p>
            
            <!-- Botões para Alterar e Excluir -->
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-bebida-id="{{ $bebida->id }}" data-bebida-nome="{{ $bebida->nome }}" data-bebida-preco="{{ $bebida->preco }}">Alterar</button>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bebida-id="{{ $bebida->id }}" data-bebida-nome="{{ $bebida->nome }}">Excluir</button>
        </div>
    @endforeach

    <!-- Modal de Adicionar Bebida -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Adicionar Bebida</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bebidas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="preco" class="form-label">Preço</label>
                            <input type="text" class="form-control" id="preco" name="preco" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Adicionar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Alterar Bebida -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Alterar Bebida</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editNome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="editNome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPreco" class="form-label">Preço</label>
                            <input type="text" class="form-control" id="editPreco" name="preco" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-warning">Alterar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                    Tem certeza que deseja excluir a bebida "<span id="bebidaNome"></span>"?
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

    <div class="mt-4">
    <a href="{{ url('/') }}" class="btn btn-outline-secondary">
        ← Voltar para Início
    </a>
</div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Para o Modal de Alterar
    var editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var bebidaId = button.getAttribute('data-bebida-id');
        var bebidaNome = button.getAttribute('data-bebida-nome');
        var bebidaPreco = button.getAttribute('data-bebida-preco');

        var modalNome = editModal.querySelector('#editNome');
        var modalPreco = editModal.querySelector('#editPreco');
        var form = editModal.querySelector('form');
        form.action = '/bebidas/' + bebidaId;

        modalNome.value = bebidaNome;
        modalPreco.value = bebidaPreco;
    });

    // Para o Modal de Excluir
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var bebidaId = button.getAttribute('data-bebida-id');
        var bebidaNome = button.getAttribute('data-bebida-nome');

        var modalBebidaNome = deleteModal.querySelector('#bebidaNome');
        modalBebidaNome.textContent = bebidaNome;

        var form = deleteModal.querySelector('#deleteForm');
        form.action = '/bebidas/' + bebidaId;
    });
</script>

</body>
</html>
