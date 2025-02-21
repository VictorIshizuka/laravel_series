<x-layout title="Criar serie">

    <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" autofocus class="form-control" id="nome" name="nome"
                    placeholder="Nome da série" value="{{ old('nome') }}">
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">Temporadas:</label>
                <input type="text" class="form-control" id="seasonsQty" name="seasonsQty"
                    value="{{ old('seasonsQty') }}">
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps/ Temporadas:</label>
                <input type="text" class="form-control" id="episodesPerSeason" name="episodesPerSeason"
                    value="{{ old('episodesPerSeason') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa:</label>
                <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png" id="cover" name="cover">
            </div>
        </div>
        <div class="row">
            <div class="">
                <button type="submit" class="btn btn-primary btn-sm" >Salvar</button>
            </div>
        </div>
    </form>


</x-layout>
