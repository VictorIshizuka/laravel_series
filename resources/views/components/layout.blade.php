<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Controle de séries</title>

    @vite(['resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('series.index') }}">Controle de séries</a>
            @auth
            <a class="navbar-brand" href="{{ route('login.logout') }}">Sair</a>
            @endauth
            @guest
            <a class="navbar-brand" href="{{ route('login') }}">Login</a>
            @endguest
        </div>
    </nav>
    <div class="container">
        <h2>{{ $title }}</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif


        {{ $slot }}
    </div>
</body>

</html>
