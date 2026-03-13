<x-app-layout>

<x-slot name="header">
<h2>Cadastro de Produto</h2>
</x-slot>

<div style="padding:20px">

<form method="POST" action="{{ route('produtos.store') }}">
@csrf

<label>Nome</label><br>
<input type="text" name="nome"><br><br>

<label>Descrição</label><br>
<textarea name="descricao"></textarea><br><br>

<label>Preço</label><br>
<input type="number" step="0.01" name="preco"><br><br>

<label>Estoque</label><br>
<input type="number" name="estoque"><br><br>

<button type="submit">Salvar</button>

</form>

</div>

</x-app-layout>