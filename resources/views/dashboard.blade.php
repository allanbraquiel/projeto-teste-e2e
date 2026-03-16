<x-app-layout>

    <x-slot name="header">
        <h2 class="h4">Dashboard</h2>
    </x-slot>

    <div class="container mt-4">

    <div class="row">

    <div class="col-md-6">

    <div class="card shadow">
    <div class="card-body text-center">

    <h5 class="card-title">👤 Pessoas</h5>
    <p class="card-text">Gerenciar Cadastro de Pessoas</p>

    <a href="/pessoas" class="btn btn-primary">
    Acessar
    </a>

    </div>
    </div>

    </div>

    <div class="col-md-6">

    <div class="card shadow">
    <div class="card-body text-center">

    <h5 class="card-title">📦 Produtos</h5>
        <p class="card-text">Gerenciar Cadastro de Produtos</p>

    <a href="/produtos" class="btn btn-success">
        Acessar
    </a>

    </div>
    </div>

    </div>

    </div>

    </div>

</x-app-layout>