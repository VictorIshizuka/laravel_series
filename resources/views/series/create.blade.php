<x-layout title="Criar serie">

    <div class="col">
        <form action="/series" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Título da série"
                    value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="description" name="description"
                    placeholder="Descrição da série" value="{{ old('description') }}">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    </div>

</x-layout>
