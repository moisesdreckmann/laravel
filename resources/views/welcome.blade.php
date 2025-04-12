<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagens - Lanches</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light p-5">

<div class="container">
    <h1 class="mb-4">Bem-vindo ao sistema de lanches 🍔🥤</h1>

    {{-- Comidas --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">🍽️ Comidas</h2>
            <a href="{{ route('comidas.create') }}" class="btn btn-sm btn-light">Cadastrar</a>
        </div>
        <div class="card-body">
            @if($comidas->isEmpty())
                <p>Nenhuma comida cadastrada.</p>
            @else
                <ul class="list-group">
                    @foreach ($comidas as $comida)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $comida->nome }}</strong> - R$ {{ number_format($comida->preco, 2, ',', '.') }}
                            </div>
                            <div>
                                <a href="{{ route('comidas.edit', $comida->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <!-- Botão para abrir modal de confirmação -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-bs-id="{{ $comida->id }}" data-bs-type="comida">
                                    Excluir
                                </button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    {{-- Bebidas --}}
    <div class="card mb-4">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">🥤 Bebidas</h2>
            <a href="{{ route('bebidas.create') }}" class="btn btn-sm btn-light">Cadastrar</a>
        </div>
        <div class="card-body">
            @if($bebidas->isEmpty())
                <p>Nenhuma bebida cadastrada.</p>
            @else
                <ul class="list-group">
                    @foreach ($bebidas as $bebida)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $bebida->nome }}</strong> - R$ {{ number_format($bebida->preco, 2, ',', '.') }}
                            </div>
                            <div>
                                <a href="{{ route('bebidas.edit', $bebida->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <!-- Botão para abrir modal de confirmação -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-bs-id="{{ $bebida->id }}" data-bs-type="bebida">
                                    Excluir
                                </button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    {{-- Usuários --}}
    <div class="card mb-4">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">👤 Usuários</h2>
            <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-light">Cadastrar</a>
        </div>
        <div class="card-body">
            @if($usuarios->isEmpty())
                <p>Nenhum usuário cadastrado.</p>
            @else
                <ul class="list-group">
                    @foreach ($usuarios as $usuario)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="text-decoration-none text-dark">
                                <strong>{{ $usuario->nome }}</strong>
                            </a>
                            <div>
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <!-- Botão para abrir modal de confirmação -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-bs-id="{{ $usuario->id }}" data-bs-type="usuario">
                                    Excluir
                                </button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

</div>

<!-- Modal de confirmação -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        Tem certeza de que deseja excluir este item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form id="deleteForm" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    var deleteModal = document.getElementById('confirmDeleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Botão que acionou o modal
        var itemId = button.getAttribute('data-bs-id');
        var itemType = button.getAttribute('data-bs-type');

        var formAction = '';
        if(itemType === 'comida') {
            formAction = '/comidas/' + itemId;
        } else if(itemType === 'bebida') {
            formAction = '/bebidas/' + itemId;
        } else if(itemType === 'usuario') {
            formAction = '/usuarios/' + itemId;
        }

        // Define a ação do formulário no modal
        var deleteForm = document.getElementById('deleteForm');
        deleteForm.action = formAction;
    });
</script>

</body>
</html>
