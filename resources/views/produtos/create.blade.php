<x-app-layout>

<x-slot name="header">
<h2 class="h4">Cadastro de Produto</h2>
</x-slot>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header">
Novo Produto
</div>

<div class="card-body">

<form method="POST" action="{{ route('produtos.store') }}">

@csrf

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Nome</label>
<input type="text" name="nome" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Preço</label>
<input type="number" step="0.01" name="preco" class="form-control" required>
</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Estoque</label>
<input type="number" name="estoque" class="form-control" required>
</div>

</div>

<div class="mb-3">

<label class="form-label">Descrição</label>
<textarea name="descricao" class="form-control"></textarea>

</div>

<div class="mt-3">

<button type="submit" class="btn btn-success">
💾 Salvar
</button>

<a href="/produtos" class="btn btn-secondary">
↩ Voltar
</a>

</div>

</form>

</div>

</div>

</div>

</x-app-layout>