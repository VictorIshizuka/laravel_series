<x-layout title="Criar serie">

    <div class="col">
        <form action="/series" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da série"
                    value="{{ old('title') }}">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    </div>

</x-layout>
