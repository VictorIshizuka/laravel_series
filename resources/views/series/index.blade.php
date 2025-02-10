<x-layout title="Séries">
    <a href="/series/create" class="btn btn-dark mb-2">Nova série</a>
    @isset($messagemSucesso)
        <div class="alert alert-success" role="alert">
            {{ session('mensagem.sucesso') }}
        </div>
    @endisset
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($series as $key => $serie)
                        <tr>
                            <th scope="row">{{ '#' }}</th>
                            <td>
                                <a href="{{ route('seasons.index', $serie) }}">
                                    {{ $serie->nome }}
                                </a>
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('series.edit', $serie) }}" class="btn btn-info btn-sm me-1">Editar</a>
                                <form action="{{ route('series.destroy', $serie) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-layout>
