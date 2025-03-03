<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('/series', \App\Http\Controllers\Api\SeriesController::class);

    Route::get('/series/{series}/seasons', fn(\App\Models\Series $series) => $series->seasons);
    Route::get('/series/{series}/episodes', fn(\App\Models\Series $series) => $series->episodes);
    Route::patch('/episode/{episode}', function (\App\Models\Episode $episode, Request $request) {
        $episode->watched = $request['watched'];
        $episode->save();
        return $episode;
    });
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (!Auth::attempt($credentials)) {
        return response()->json('Unauthorized', 401);
    }
    $user = Auth::user();
    $token = $user->createToken('auth_token', ['series:delete'])->plainTextToken;
    return response()->json(['token' => $token]);
});
