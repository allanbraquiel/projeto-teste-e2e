<x-app-layout>

<x-slot name="header">
<h2>Editar Pessoa</h2>
</x-slot>

<div style="padding:20px">

<form method="POST" action="{{ route('pessoas.update',$pessoa->id) }}">

@csrf
@method('PUT')

Nome<br>
<input type="text" name="nome" value="{{ $pessoa->nome }}"><br><br>

CPF<br>
<input type="text" name="cpf" value="{{ $pessoa->cpf }}"><br><br>

Email<br>
<input type="email" name="email" value="{{ $pessoa->email }}"><br><br>

Telefone<br>
<input type="text" name="telefone" value="{{ $pessoa->telefone }}"><br><br>

<button type="submit">
Atualizar
</button>

</form>

</div>

</x-app-layout>