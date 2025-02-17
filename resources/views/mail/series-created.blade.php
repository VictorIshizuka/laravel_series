@component('mail::message')
    # {{ $nomeSerie }} criada com sucesso!!

    Olá, sua serie {{ $nomeSerie }} foi criada com sucesso!

    A serie possui {{ $qtdTemporadas }} temporadas e {{ $episodiosPorTemporada }} episodios por temporada.

    @component('mail::button', ['url' => route('seasons.index', $idSerie)])
        Ir para a serie
    @endcomponent

@endcomponent
