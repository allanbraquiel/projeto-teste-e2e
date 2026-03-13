<x-app-layout>

<x-slot name="header">
<h2 class="h4">Cadastro de Pessoa</h2>
</x-slot>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header">
Nova Pessoa
</div>

<div class="card-body">

<form method="POST" action="{{ route('pessoas.store') }}">

@csrf

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Nome</label>
<input type="text" name="nome" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">CPF</label>
<input type="text" name="cpf" class="form-control" required>
</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Telefone</label>
<input type="text" name="telefone" class="form-control">
</div>

</div>

<div class="mt-3">

<button type="submit" class="btn btn-success">
💾 Salvar
</button>

<a href="/pessoas" class="btn btn-secondary">
↩ Voltar
</a>

</div>

</form>

</div>

</div>

</div>

</x-app-layout>