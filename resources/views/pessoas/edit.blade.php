<x-app-layout>

<x-slot name="header">
<h2 class="h4">Editar Pessoa</h2>
</x-slot>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header">
Editar Pessoa
</div>

<div class="card-body">

<form method="POST" action="{{ route('pessoas.update', $pessoa->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Nome</label>
<input type="text"
name="nome"
class="form-control"
value="{{ $pessoa->nome }}"
required
data-test="input-nome-pessoa">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">CPF</label>
<input type="text"
name="cpf"
class="form-control"
value="{{ $pessoa->cpf }}"
required
data-test="input-cpf-pessoa">
</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Email</label>
<input type="email"
name="email"
class="form-control"
value="{{ $pessoa->email }}"
data-test="input-email-pessoa">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Telefone</label>
<input type="text"
name="telefone"
class="form-control"
value="{{ $pessoa->telefone }}"
data-test="input-telefone-pessoa">
</div>

</div>

<div class="mt-3">

<button type="submit"
class="btn btn-success"
data-test="btn-atualizar-pessoa">
💾 Atualizar
</button>

<a href="/pessoas"
class="btn btn-secondary">
↩ Voltar
</a>

</div>

</form>

</div>

</div>

</div>

</x-app-layout>