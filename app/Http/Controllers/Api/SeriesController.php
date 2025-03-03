<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;
use App\Models\Series;

class SeriesController extends Controller
{

    public function __construct(private \App\Repositories\SeriesRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        return Series::all();
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);
        return  response()->json($serie, 201);
    }

    public function show(int $series)
    {
        $serie =   Series::whereId($series)->with('seasons.episodes')->first();

        return  response()->json($serie, 200);
    }

    public function update(SeriesFormRequest $request, Series $series){
        $series->fill($request->all());
        $series->save();
    }

    public function destroy(Series $series){
        $series->delete();
        return response()->json(null, 204);
    }
}
