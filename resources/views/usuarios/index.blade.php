<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Lista de Usuários</h1>

    <!-- Botão para Adicionar novo usuário -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Adicionar Usuário</button>

    @foreach ($usuarios as $usuario)
        <div class="mb-2">
            <p>{{ $usuario->nome }} - {{ $usuario->email }}</p>
            
            <!-- Botões para Alterar e Excluir -->
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-usuario-id="{{ $usuario->id }}" data-usuario-nome="{{ $usuario->nome }}" data-usuario-email="{{ $usuario->email }}">Alterar</button>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-usuario-id="{{ $usuario->id }}" data-usuario-nome="{{ $usuario->nome }}">Excluir</button>
        </div>
    @endforeach

    <!-- Modal de Adicionar Usuário -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Adicionar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
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

    <!-- Modal de Alterar Usuário -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Alterar Usuário</h5>
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
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editSenha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="editSenha" name="senha">
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
                    Tem certeza que deseja excluir o usuário "<span id="usuarioNome"></span>"?
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

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Para o Modal de Alterar
    var editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var usuarioId = button.getAttribute('data-usuario-id');
        var usuarioNome = button.getAttribute('data-usuario-nome');
        var usuarioEmail = button.getAttribute('data-usuario-email');

        var modalNome = editModal.querySelector('#editNome');
        var modalEmail = editModal.querySelector('#editEmail');
        var form = editModal.querySelector('form');
        form.action = '/usuarios/' + usuarioId;  // URL da alteração

        modalNome.value = usuarioNome;
        modalEmail.value = usuarioEmail;
    });

    // Para o Modal de Excluir
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var usuarioId = button.getAttribute('data-usuario-id');
        var usuarioNome = button.getAttribute('data-usuario-nome');

        var modalUsuarioNome = deleteModal.querySelector('#usuarioNome');
        modalUsuarioNome.textContent = usuarioNome;

        var form = deleteModal.querySelector('#deleteForm');
        form.action = '/usuarios/' + usuarioId;
    });
</script>

</body>
</html>
