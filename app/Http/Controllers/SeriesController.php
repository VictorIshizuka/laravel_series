<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {
        $this->repository = $repository;
        // $this->middleware(Autenticador::class)->except('index');

    }

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

    public function store(SeriesFormRequest $request,)
    {
        $coverPath = $request->file('cover')->store('series_cover', 'public');
        $request['coverPath'] = $coverPath;
        $serie = $this->repository->add($request);
        \App\Events\SeriesCreated::dispatch($serie->nome, $serie->id, $request->seasonsQty, $request->episodesPerSeason, Auth::user()->email);


        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '$serie->nome' criada com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {

        if ($request->hasFile('cover')) {

            if ($series->cover && $series->cover !== 'no-image.jpeg') {
                event(new \App\Events\DeleteSeries($series->cover));
            }


            $coverPath = $request->file('cover')->store('series_cover', 'public');
            $data['cover'] = $coverPath;
        } else {

            $data['cover'] = $series->cover ?? 'no-image.jpeg';
        }

        $series->update($data);

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '$series->nome' atualizada com sucesso!");
    }

    public function destroy(Series $series, Request $request)
    {
        if ($series->id) {

            event(new \App\Events\DeleteSeries($series->cover));
            $series->delete();
        }


        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '$series->nome' excluída com sucesso!");
    }
}
