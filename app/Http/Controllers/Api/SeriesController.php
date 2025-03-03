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
    public function index(Request $request)
    {
        $query = Series::query();
        if (!$request->has('nome')) {
            return $query->paginate();
        }
        return $query->where('nome',$request['nome']);
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);
        return  response()->json($serie, 201);
    }

    public function show(int $series)
    {
        $serie =   Series::with('seasons.episodes')->find($series);

        if (!$serie) {
            return response()->json(['message' => 'Serie nao encontrada'], 404);
        }

        return  response()->json($serie, 200);
    }

    public function update(SeriesFormRequest $request, Series $series)
    {
        $series->fill($request->all());
        $series->save();
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return response()->json(null, 204);
    }
}
