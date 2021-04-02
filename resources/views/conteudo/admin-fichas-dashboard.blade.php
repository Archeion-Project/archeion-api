@extends('layouts.app')

@section('content')

<div class="container col-sm">
	<br>

		<!-- Alerts -->

		@isset($mensagem)
			@if ($mensagem == 'store')
				<div class="alert alert-success" id="div-confirmacao" role="alert">
					Ficha Catalográfica Cadastrada Com Sucesso!
				</div>
			@elseif ($mensagem == 'store-error')
				<div class="alert alert-danger" id="div-confirmacao" role="alert">
					Erro Ao Cadastrar Ficha Catalográfica!
				</div>
			@elseif ($mensagem == 'update')
				<div class="alert alert-success" id="div-confirmacao" role="alert">
					Ficha Catalográfica Atualizada Com Sucesso!
				</div>
			@elseif ($mensagem == 'update-error')
				<div class="alert alert-danger" id="div-confirmacao" role="alert">
					Erro Ao Atualizar Ficha Catalográfica!
				</div>
			@elseif ($mensagem == 'destroy')
				<div class="alert alert-success" id="div-confirmacao" role="alert">
					Ficha Catalográfica Apagada Com Sucesso!
				</div>
			@elseif ($mensagem == 'destroy-error')
				<div class="alert alert-danger" id="div-confirmacao" role="alert">
					Erro Ao Apagar Ficha Catalográfica!
				</div>
			@endif
		@endisset

		<!-- Formulário -->

	<form action="{!! route('ficha.store') !!}" method="POST" enctype="multipart/form-data">
		@csrf
		<br>
		<h2>Adicionar Ficha Catalográfica</h2>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="input-assunto">Assunto</label>
				<input type="text" class="form-control" id="assunto" name="assunto" placeholder="Digite aqui o assunto">
			</div>
			<div class="form-group col-sm md-form">
				<label for="input-periodico">Periódico</label>
				<select class="form-select" id="periodico" name="periodico">
					@foreach ($periodicos as $periodico)
						<option value="{{ $periodico->id }}">{{ $periodico->titulo }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-sm">
				<label for="input-pagina">Página</label>
				<input type="text" class="form-control" id="pagina" name="pagina" placeholder="Página">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="input-data-edicao">Data da Edição</label>
				<input type="text" class="form-control datepicker" id="data_edicao" name="data_edicao" placeholder="Data da Edição" readonly='true'>
			</div>
			<div class="form-group col-sm">
				<label for="inputEdicao">Edição</label>
				<input type="text" class="form-control" id="edicao" name="edicao" placeholder="Edição">
			</div>
			<div class="form-group col-sm">
				<label for="inputDuracaoEdicao">Escolha a Duração da Edição</label>
				<input type="text" class="form-control datepicker" id="duracao_edicao" name="duracao_edicao" placeholder="Duração da Edição" readonly='true'>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="inputResumo">Resumo</label>
				<textarea type="text" class="form-control" id="resumo" name="resumo" placeholder="Resumo"></textarea>
			</div>
			<div class="form-group col-sm">
				<label for="inputComentario">Comentário</label>
				<textarea type="text" class="form-control" id="comentario" name="comentario" placeholder="Comentário"></textarea>
			</div>
		</div>
		<br>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Cadastrar Ficha</button>
		</div>
	</form>
</div>

<!-- Grid -->

<div class="container col-sm">
	<br>
		<h2>Fichas Cadastradas</h2>
	<br>
	<table class="table table-sm" id="grid-lista">
		<thead class="stick-head">
			<tr>
				<th scope="col-2">Assunto</th>
				<th scope="col-2">Periódico</th>
				<th scope="col-2">Data da Edição</th>
				<!-- <th scope="col-4">Edição</th>
				<th scope="col-2">Duração Edição</th> -->
				<th scope="col-2">Página</th>
				<th scope="col-2">Resumo</th>
				<th scope="col-2">Comentário</th>
				<!-- <th scope="col-2">Criado em:</th>
				<th scope="col-2">Alterado em:</th> -->
				<th scope="col-2">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($fichas as $ficha)
				<tr id="grid-items">
					<td>{{ $ficha->assunto }}</td>
					<td>{{ \App\Periodico::find($ficha->periodico_id)->titulo }}</td>
					<td>{{ (new \Carbon\Carbon($ficha->data_edicao))->format('d/m/Y') }}</td>
					<!-- <td>{{ $ficha->edicao }}</td>
					<td>{{ $ficha->data_edicao->diffInDays($ficha->duracao_edicao) }}</td> -->
					<td>{{ $ficha->pagina }}</td>
					<td>{{ $ficha->resumo }}</td>
					<td>{{ $ficha->comentario }}</td>
					<!-- <td>{{ (new \Carbon\Carbon($ficha->created_at))->format('d/m/Y') }}</td>
					<td>{{ (new \Carbon\Carbon($ficha->updated_at))->format('d/m/Y') }}</td> -->
					<td>
						<!-- Default dropleft button -->
						<div class="btn-group dropleft">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Clique
						</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<!-- Dropdown menu links -->
								<h6 class="dropdown-header">{{ $ficha->assunto }}</h6>
								<a href="{!! route('ficha.edit', $ficha) !!}" class="dropdown-item" id="editar-item-grid">Editar</a>
								<a href="{!! route('ficha.show', $ficha) !!}" class="dropdown-item" id="apagar-item-grid">Apagar</a>
							</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Apagar Modal -->

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="container col-md">
				<div class="modal-header">
					<h2 class="modal-title black">Confirma Apagar Ficha? {{ route('ficha.destroy', $ficha) }}</h2>
				</div>
				<form action="{{ route('ficha.destroy', $ficha) }}" id="modal-form" method="DELETE">
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

@endsection