<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo ao Sistema de Lanches</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="text-center">
        <h1 class="mb-4">🍔 Bem-vindo ao Sistema de Lanches</h1>
        <p class="lead">Gerencie comidas, bebidas e usuários de forma prática.</p>
        
        <!-- Links para Comidas, Bebidas e Usuários -->
        <div class="mt-3">
            <a href="{{ route('comidas.index') }}" class="btn btn-success btn-lg">Gerenciar Comidas</a>
            <a href="{{ route('bebidas.index') }}" class="btn btn-primary btn-lg">Gerenciar Bebidas</a>
            <a href="{{ route('usuarios.index') }}" class="btn btn-warning btn-lg">Gerenciar Usuários</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Botão que abriu o modal
            var usuarioId = button.getAttribute('data-usuario-id');
            var usuarioNome = button.getAttribute('data-usuario-nome');

            var modalUsuarioNome = deleteModal.querySelector('#usuarioNome');
            modalUsuarioNome.textContent = usuarioNome;

            var form = deleteModal.querySelector('#deleteForm');
            form.action = '/usuarios/' + usuarioId; // Atualiza a rota de exclusão
        });
    </script>

</body>
</html>
