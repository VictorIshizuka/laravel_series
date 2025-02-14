<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function store(Request $request) {
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('series.index');
        }
        return redirect()->back()->withErrors('Usuário ou senha inválido!');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function indexRegister() {
        return view('login.register');
    }

    public function register(Request $request) {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        $user = \App\Models\User::create($data);
        Auth::login($user);
        return redirect()->route('series.index');
    }
}
