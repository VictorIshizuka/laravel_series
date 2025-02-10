<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Season;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::query()->orderBy('nome')->get();
        $messagemSucesso = session('mensagem.sucesso');
        return view('series.index', compact('series', 'messagemSucesso'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $nomeSerie = $request->input('nome');
        $serie = new Series();
        $serie->nome = $nomeSerie;
        $serie->save();

        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($episodes);

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '$serie->nome' criada com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('nome', $series->nome);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '$series->nome' atualizada com sucesso!");
    }

    public function destroy(Series $series, Request $request)
    {
        $series->delete();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '$series->nome' excluída com sucesso!");
    }
}
