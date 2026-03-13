<x-app-layout>

<x-slot name="header">
<h2>Cadastro de Pessoa</h2>
</x-slot>

<div style="padding:20px">

<form method="POST" action="{{ route('pessoas.store') }}">
@csrf

<label>Nome</label><br>
<input type="text" name="nome"><br><br>

<label>CPF</label><br>
<input type="text" name="cpf"><br><br>

<label>Email</label><br>
<input type="email" name="email"><br><br>

<label>Telefone</label><br>
<input type="text" name="telefone"><br><br>

<button type="submit">Salvar</button>

</form>

</div>

</x-app-layout>