<x-app-layout>

<x-slot name="header">
<h2 class="h4">Editar Produto</h2>
</x-slot>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header">
Editar Produto
</div>

<div class="card-body">

<form method="POST" action="{{ route('produtos.update', $produto->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Nome</label>
<input type="text"
name="nome"
class="form-control"
value="{{ $produto->nome }}"
required
data-test="input-nome-produto">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Preço</label>
<input type="number"
step="0.01"
name="preco"
class="form-control"
value="{{ $produto->preco }}"
required
data-test="input-preco-produto">
</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Estoque</label>
<input type="number"
name="estoque"
class="form-control"
value="{{ $produto->estoque }}"
required
data-test="input-estoque-produto">
</div>

</div>

<div class="mb-3">

<label class="form-label">Descrição</label>

<textarea
name="descricao"
class="form-control"
data-test="input-descricao-produto">{{ $produto->descricao }}</textarea>

</div>

<div class="mt-3">

<button type="submit"
class="btn btn-success"
data-test="btn-atualizar-produto">
💾 Atualizar
</button>

<a href="/produtos"
class="btn btn-secondary">
↩ Voltar
</a>

</div>

</form>

</div>

</div>

</div>

</x-app-layout>