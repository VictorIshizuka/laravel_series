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
        $serie = $this->repository->add($request);
        \App\Events\SeriesCreated::dispatch($serie->nome, $serie->id, $request->seasonsQty, $request->episodesPerSeason, Auth::user()->email);


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
