<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        $messagemSucesso = session('mensagem.sucesso');
        return view('episodes.index', ['episodes' => $season->episodes])->with('messagemSucesso', $messagemSucesso);
    }


    public function update(Request $request, Season $season)
    {

        DB::beginTransaction();
        $watchedEpisodes = $request->episodes;

        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {

            $episode->watched = in_array($episode->id, $watchedEpisodes);
        });
        $season->push();

        DB::commit();

        return redirect()->route('episodes.index', $season->id)->with('mensagem.sucesso', "Episódios marcados com sucesso!");
    }
}
