<x-layout title="Episodios">
    @isset($messagemSucesso)
        <div class="alert alert-success" role="alert">
            {{ session('mensagem.sucesso') }}
        </div>
    @endisset
    <div class="row">
        <div class="col">
            <form method="POST">
                @csrf
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Episodios</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($episodes as $episode)
                            <tr>
                                <td>
                                    {{ ' Episodio ' . $episode->number }}
                                </td>
                                <td>
                                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}"
                                        @if ($episode->watched) checked @endif />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            </form>
        </div>
    </div>

</x-layout>
