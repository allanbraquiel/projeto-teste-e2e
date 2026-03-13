<x-app-layout>

<x-slot name="header">
<h2 class="h4">Lista de Pessoas</h2>
</x-slot>

<div class="container mt-4">

<a href="{{ route('pessoas.create') }}" class="btn btn-primary mb-3">
➕ Nova Pessoa
</a>

<table class="table table-striped table-bordered">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Nome</th>
<th>CPF</th>
<th>Email</th>
<th>Ações</th>
</tr>

</thead>

<tbody>

@foreach ($pessoas as $pessoa)

<tr>

<td>{{ $pessoa->id }}</td>
<td>{{ $pessoa->nome }}</td>
<td>{{ $pessoa->cpf }}</td>
<td>{{ $pessoa->email }}</td>

<td>

<a href="{{ route('pessoas.edit',$pessoa->id) }}"
class="btn btn-warning btn-sm">
✏️ Editar
</a>

<form action="{{ route('pessoas.destroy',$pessoa->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button 
    class="btn btn-danger btn-sm"
    data-bs-toggle="modal"
    data-bs-target="#deleteModal"
    data-id="{{ $pessoa->id }}"
    data-nome="{{ $pessoa->nome }}">
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

<div class="modal fade" id="deleteModal" tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">Confirmar exclusão</h5>

<button type="button" class="btn-close" data-bs-dismiss="modal"></button>

</div>

<div class="modal-body">

<p id="deleteMessage"></p>

</div>

<div class="modal-footer">

<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancelar
</button>

<form id="deleteForm" method="POST">

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

const deleteModal = document.getElementById('deleteModal')

deleteModal.addEventListener('show.bs.modal', function (event) {

const button = event.relatedTarget

const id = button.getAttribute('data-id')
const nome = button.getAttribute('data-nome')

const form = document.getElementById('deleteForm')

form.action = '/pessoas/' + id

document.getElementById('deleteMessage').innerText =
'Deseja realmente excluir a pessoa: ' + nome + '?'

})

</script>

</x-app-layout>