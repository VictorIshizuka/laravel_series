<x-layout title="Temporadas da série {!! $serie->nome !!} ">

    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        {{-- <th scope="col">ID</th> --}}
                        <th scope="col">Temporada</th>
                        <th scope="col">Episodios</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seasons as $season)
                        <tr>
                            {{-- <th scope="row">{{ $season->id }}</th> --}}
                            <td>
                                <a href="{{ route('episodes.index', $season->id) }}" class="">
                                    {{ ' Temporada ' . $season->number }}
                                </a>
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{$season->watchedCount->count()}} / {{ $season->episodes->count() }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-layout>
