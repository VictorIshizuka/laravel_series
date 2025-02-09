<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = [
            'Game of Thrones',
            'Vikings',
            'The Walking Dead',
        ];
        return view('series.index', compact('series'));
    }

    public function create(){
        return view('series.create');
    }
}
