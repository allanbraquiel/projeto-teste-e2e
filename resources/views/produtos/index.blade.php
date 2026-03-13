<x-app-layout>

<x-slot name="header">
<h2 class="h4">Lista de Produtos</h2>
</x-slot>

<div class="container mt-4">

<a href="{{ route('produtos.create') }}"
class="btn btn-success mb-3">
➕ Novo Produto
</a>

<table class="table table-striped table-bordered">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Nome</th>
<th>Preço</th>
<th>Estoque</th>
<th>Ações</th>
</tr>

</thead>

<tbody>

@foreach ($produtos as $produto)

<tr>

<td>{{ $produto->id }}</td>
<td>{{ $produto->nome }}</td>
<td>R$ {{ $produto->preco }}</td>
<td>{{ $produto->estoque }}</td>

<td>

<a href="{{ route('produtos.edit',$produto->id) }}"
class="btn btn-warning btn-sm">
✏️ Editar
</a>

<form action="{{ route('produtos.destroy',$produto->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button 
class="btn btn-danger btn-sm"
data-bs-toggle="modal"
data-bs-target="#deleteModalProduto"
data-id="{{ $produto->id }}"
data-nome="{{ $produto->nome }}">
🗑 Excluir
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<!-- Modal de confirmação -->

<div class="modal fade" id="deleteModalProduto" tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">Confirmar exclusão</h5>

<button type="button" class="btn-close" data-bs-dismiss="modal"></button>

</div>

<div class="modal-body">

<p id="deleteMessageProduto"></p>

</div>

<div class="modal-footer">

<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancelar
</button>

<form id="deleteFormProduto" method="POST">

@csrf
@method('DELETE')

<button type="submit" class="btn btn-danger">
Confirmar Exclusão
</button>

</form>

</div>

</div>

</div>

</div>

<script>

const deleteModalProduto = document.getElementById('deleteModalProduto')

deleteModalProduto.addEventListener('show.bs.modal', function (event) {

const button = event.relatedTarget

const id = button.getAttribute('data-id')
const nome = button.getAttribute('data-nome')

const form = document.getElementById('deleteFormProduto')

form.action = '/produtos/' + id

document.getElementById('deleteMessageProduto').innerText =
'Deseja realmente excluir o produto: ' + nome + '?'

})

</script>

</x-app-layout>