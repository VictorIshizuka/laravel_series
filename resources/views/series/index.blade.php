<x-layout title="Séries">
    <a href="/series/create" class="btn btn-dark mb-2">Nova série</a>

    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        {{-- <th scope="col">Descrição</th> --}}
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($series as $key => $serie)
                        <tr>
                            <th scope="row">{{ '#' }}</th>
                            <td>{{ $key }}</td>
                            {{-- <td>{{ $serie->description }}</td> --}}
                            <td>
                                <a href="/series/{{ '#' }}" class="btn btn-info">Detalhes</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-layout>
