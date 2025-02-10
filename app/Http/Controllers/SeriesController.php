<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $messagemSucesso = session('mensagem.sucesso');
        return view('series.index', compact('series', 'messagemSucesso'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {

        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '$serie->nome' criada com sucesso!");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('nome', $series->nome);
    }

    public function update(Serie $series, Request $request)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '$series->nome' atualizada com sucesso!");
    }

    public function destroy(Serie $series, Request $request)
    {
        $series->delete();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '$series->nome' excluída com sucesso!");
    }
}
