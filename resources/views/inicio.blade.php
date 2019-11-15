@extends('layouts.app')
@section('content')

<div class="index">
	<div>
		<h1 class="display-4 text-center">Hemeroteca Digital de Juiz de Fora</h1>
	</div>
	<div>
		<h1 class="display-4 text-center sub-header">Setor de Memória</h1>
	</div>
	<div>
		<h1 class="display-4 text-center sub-header">Biblioteca Municipal Murilo Mendes</h1>
	</div>

	<form action="/executaBusca" method="post">
		@csrf
		@method('GET')
		<div class="container form-busca">
			<div class="form-group">
				<input type="text" class="form-control" name="termoBusca" placeholder="Busque no acervo" aria-label="Recipient's username" aria-describedby="button-addon2" autofocus>
				<p>Filtrar busca por:</p>
				<div class="form-check form-check-inline">
					<input class="form-check-input form-check" type="radio" id="inlineCheckbox1" name="filtro" value="assunto">
					<label class="form-check-label" for="inlineCheckbox1">Assunto </label>
					<input class="form-check-input form-check" type="radio" id="inlineCheckbox2" name="filtro" value="periodico">
					<label class="form-check-label" for="inlineCheckbox2">Periódico </label>
					<input class="form-check-input form-check" type="radio" id="inlineCheckbox3" name="filtro" value="resumo">
					<label class="form-check-label" for="inlineCheckbox3">Resumo </label>
					<input class="form-check-input form-check" type="radio" id="inlineCheckbox4" name="filtro" value="resumo">
					<label class="form-check-label" for="inlineCheckbox3">Comentários </label>
				</div>
				<div>
					<button type="submit" class="btn btn-primary">Pesquisar</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection