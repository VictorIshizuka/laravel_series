<x-layout title="Login">
    <form action="{{ route('login.store') }}" method="POST" class="mt-2">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Entrar</button>
        <a href="{{route('login.register')}}" class="btn btn-dark mt-3">Cadastrar</a>
    </form>
</x-layout>
