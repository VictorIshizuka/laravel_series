<x-layout title="Editar serie {!! $series->nome !!}">

    <form action="{{ route('series.update', $series) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $series->id }}">
        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" autofocus class="form-control" id="nome" name="nome"
                    placeholder="Nome da série" value="{{ $series->nome ?? '' }}">
            </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa:</label>
                <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png" id="cover"
                    name="cover">
            </div>
        </div>
        <div class="row">
            <div class="">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            </div>
        </div>
    </form>


</x-layout>
