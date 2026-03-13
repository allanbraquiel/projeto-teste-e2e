<x-app-layout>

<x-slot name="header">
<h2>Lista de Produtos</h2>
</x-slot>

<div style="padding:20px">

<a href="{{ route('produtos.create') }}">
<button>➕ Novo Produto</button>
</a>

<br><br>

<table border="1" cellpadding="5">

<tr>
<th>ID</th>
<th>Nome</th>
<th>Preço</th>
<th>Estoque</th>
<th>Ações</th>
</tr>

@foreach ($produtos as $produto)

<tr>

<td>{{ $produto->id }}</td>
<td>{{ $produto->nome }}</td>
<td>{{ $produto->preco }}</td>
<td>{{ $produto->estoque }}</td>

<td>

<a href="{{ route('produtos.edit',$produto->id) }}">
✏️ Editar
</a>

<form action="{{ route('produtos.destroy',$produto->id) }}" method="POST" style="display:inline">

@csrf
@method('DELETE')

<button type="submit">
🗑 Excluir
</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>

</x-app-layout>