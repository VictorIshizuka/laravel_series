<x-layout title="Cadastrar">
    <form action="{{ route('login.register') }}" method="POST" class="mt-2">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
    </form>
</x-layout>
