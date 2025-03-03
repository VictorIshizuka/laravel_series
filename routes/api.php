<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/series', \App\Http\Controllers\Api\SeriesController::class);

Route::get('/series/{series}/seasons', fn(\App\Models\Series $series) => $series->seasons);
Route::get('/series/{series}/episodes', fn(\App\Models\Series $series) => $series->episodes);
Route::patch('/episode/{episode}', function (\App\Models\Episode $episode, Request $request) {
    $episode->watched = $request['watched'];
    $episode->save();
    return $episode;
});
