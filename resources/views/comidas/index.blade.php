<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários e Comidas para Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4">👥 Usuários e Comidas para Comprar</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Botão para abrir modal de criação --}}
    <button class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#modalCriarComida">
        + Criar nova comida
    </button>

    @if($usuarios->isEmpty())
        <div class="alert alert-info">Nenhum usuário cadastrado.</div>
    @endif

    @if($comidas->isEmpty())
        <div class="alert alert-warning">Nenhuma comida disponível para compra.</div>
    @endif

    @foreach($usuarios as $usuario)
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $usuario->nome }}</strong> — {{ $usuario->email }}
                </div>
                <div>
                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm me-2">Alterar</a>
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja mesmo excluir este usuário?')">Deletar</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <h5>Comidas disponíveis para compra:</h5>
                <div class="row">
                    @foreach($comidas as $comida)
                        <div class="col-md-3 mb-3">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title">{{ $comida->nome }}</h6>
                                    <p class="card-text">Preço: R$ {{ number_format($comida->preco ?? 0, 2, ',', '.') }}</p>

                                    <div class="mt-auto">
                                        {{-- Formulário POST para comprar comida --}}
                                        <form action="{{ route('comprar.comida') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                                            <input type="hidden" name="comida_id" value="{{ $comida->id }}">
                                            <button type="submit" class="btn btn-primary btn-sm mb-2">Comprar</button>
                                        </form>

                                        <a href="{{ route('comidas.edit', $comida->id) }}" class="btn btn-warning btn-sm me-1">Alterar</a>

                                        <form action="{{ route('comidas.destroy', $comida->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja mesmo excluir esta comida?')">Deletar</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

    <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-secondary">← Voltar para o Início</a>
    </div>
</div>

<!-- Modal Criar Comida -->
<div class="modal fade" id="modalCriarComida" tabindex="-1" aria-labelledby="modalCriarComidaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('comidas.store') }}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="modalCriarComidaLabel">Criar Nova Comida</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="preco" class="form-label">Preço</label>
          <input type="number" step="0.01" min="0" class="form-control" id="preco" name="preco" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
