@extends('layouts.app')

@section('content')

<div class="container col-sm">
	<br>

		<!-- Formulário -->

	<form action="{!! route('ficha.store') !!}" method="POST" enctype="multipart/form-data">
		@csrf
		<br>
		<h2>Gerenciar Periodicos</h2>
		<br>

<!-- Grid -->

<div class="container col-sm">
	<br>
		<h4>Periódicos Cadastrados</h4>
	<br>
	<table class="table table-sm" id="grid-lista">
		<thead class="stick-head">
			<tr>
				<th scope="col-2">Id</th>
				<th scope="col-2">Título</th>
				<th scope="col-2">Total Ediçoes</th>
				<th scope="col-2">Total Páginas</th>
				<th scope="col-2">Início Acervo</th>
				<th scope="col-2">Término Acervo</th>
				<th scope="col-2">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($periodicos as $periodico)
				<tr id="grid-items" style="cursor: pointer; cursor: hand;" title="Clique para acessar o acervo">
					<td onclick="location.href='{!! route('periodico.show', $periodico) !!}'">{{ $periodico->id }}</td>
					<td onclick="location.href='{!! route('periodico.show', $periodico) !!}'">{{ $periodico->titulo }}</td>
					<td onclick="location.href='{!! route('periodico.show', $periodico) !!}'">{{ $numeroIssues[$periodico->id] }}</td>
					<td onclick="location.href='{!! route('periodico.show', $periodico) !!}'">{{ $numeroPages[$periodico->id] }}</td>
					<td onclick="location.href='{!! route('periodico.show', $periodico) !!}'" title="Data da primeira edição no acervo">{{ $dataInicio[$periodico->id] }}</td>
					<td onclick="location.href='{!! route('periodico.show', $periodico) !!}'" title="Data da última edição no acervo">{{ $dataTermino[$periodico->id] }}</td>
					<td>
						<!-- Default dropleft button -->
						<div class="btn-group dropleft">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Clique
						</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<!-- Dropdown menu links -->
								<h6 class="dropdown-header">{{ $periodico->titulo }}</h6>
								<a class="dropdown-item" id="editar-item-grid" data-toggle="modal" data-target="#editar-modal" data-whatever="{{ $periodico }}">Editar</a>
								<a href="#" class="dropdown-item" id="apagar-item-grid" data-toggle="modal" data-target="#apagar-modal" data-whatever="{{ $periodico }}">Apagar</a>
							</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Editar Modal -->

<div class="modal fade" id="editar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title black">Editar Periódico</h2>
			</div>
			<form action="{!! route('periodico.update', $periodico) !!}" id="modal-form" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="container col-lg">
					<div class="row">
						<div class="modal-body-titulo form-modal form-group col-md">
							<label for="modal-titulo" class="col-form-label">Nome do periódico</label>
							<input type="text" class="form-control" id="modal-titulo" value="{{$periodico->titulo}}" name="assunto" placeholder="Digite aqui o nome do periódico">
						</div>
					</div>
					<div class="row">
						<div class="modal-body-localizacao form-modal form-group col-md">
							<label for="modal-localizacao">Localização</label>
							<input type="text" class="form-control" id="modal-pagina" value="{{$periodico->localizacao}}" name="pagina" placeholder="Digite aqui a localização">
						</div>
						<div class="modal-body-imprenta form-modal form-group col-md">
							<label for="modal-imprenta">Imprenta</label>
							<input type="text" class="form-control datepicker" id="modal-imprenta" value="{{$periodico->imprenta}}" name="imprenta" placeholder="Digite aqui a Imprenta" readonly='true'>
						</div>
					</div>
					<div class="row">
						<div class="modal-body-periodicidade form-modal form-group col-md">
							<label for="modal-periodicidade">Periodicidade</label>
							<input type="text" class="form-control" id="modal-periodicidade" value="{{$periodico->periodicidade}}" name="periodicidade" placeholder="Escolha a periodicidade">
						</div>
						<div class="modal-body-sigla form-modal form-group col-md">
							<label for="modal-sigla">Sigla</label>
							<input type="text" class="form-control" id="modal-sigla" value="{{$periodico->sigla}}" name="sigla" placeholder="Digite a sigla">
						</div>
						<div class="modal-body-forma-fisica form-modal form-group col-md">
							<label for="modal-forma_fisica">Forma física</label>
							<input type="text" class="form-control" id="modal-forma_fisica" value="{{$periodico->forma_fisica}}" name="forma_fisica" placeholder="Escolha a forma física">
						</div>
					</div>
					<div class="row">
						<div class="modal-body-fonte-descricao form-modal form-group col-md">
							<label for="modal-fonte_descricao">Descrição</label>
							<textarea type="text" class="form-control" id="modal-fonte_descricao" value="{{$periodico->fonte_descricao}}" name="fonte_descricao" placeholder="Digite aqui a Descrição"></textarea>
						</div>
						<div class="modal-body-data-criacao form-modal form-group col-md">
							<label for="modal-data_criacao">Data da Criação</label>
							<input type="text" class="form-control datepicker" id="modal-data_criacao" value="{{$periodico->data_criacao}}" name="data_criacao" placeholder="Escolha a data de criação do periódico " readonly='true'>
						</div>
						<div class="modal-body-data-termino form-modal form-group col-md">
							<label for="modal-data_termino">Data do Término</label>
							<input type="text" class="form-control datepicker" id="modal-data_termino" value="{{$periodico->data_termino}}" name="data_termino" placeholder="Escolha a data de término do periódico" readonly='true'>
						</div>
					</div>
					<br>
					<div class="form-group col-md">
						<button type="submit" class="btn btn-primary">Atualizar Periodico</button>
					</div>
					<br>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="apagar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="container col-md">
				<div class="modal-header">
					<h2 class="modal-title black">Confirma Apagar Ficha?</h2>
				</div>
					<form action="{{ route('periodico.destroy', $periodico) }}" id="modal-form" method="DELETE">
						<div class="form-group col-md">
							<button type="submit" class="btn btn-danger">Sim</button>
							<button type="button" class="btn btn-info" data-dismiss="modal">Não</button>
						</div>
					</form>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection