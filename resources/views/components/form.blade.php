<form action="{{ $action }}" method="POST">
    @csrf
    @isset($nome)
        @method('PUT')
    @endisset
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da série"
            @isset($nome)
            value="{{ $nome }}"
            @endisset>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
