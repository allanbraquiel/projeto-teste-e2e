<x-app-layout>

<x-slot name="header">
<h2>Lista de Pessoas</h2>
</x-slot>

<div style="padding:20px">

<a href="{{ route('pessoas.create') }}">
<button>➕ Nova Pessoa</button>
</a>

<br><br>

<table border="1" cellpadding="5">

<tr>
<th>ID</th>
<th>Nome</th>
<th>CPF</th>
<th>Email</th>
<th>Ações</th>
</tr>

@foreach ($pessoas as $pessoa)

<tr>

<td>{{ $pessoa->id }}</td>
<td>{{ $pessoa->nome }}</td>
<td>{{ $pessoa->cpf }}</td>
<td>{{ $pessoa->email }}</td>

<td>

<a href="{{ route('pessoas.edit',$pessoa->id) }}">
✏️ Editar
</a>

<form action="{{ route('pessoas.destroy',$pessoa->id) }}" method="POST" style="display:inline">

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