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
				<label for="inputAssunto">Assunto</label>
				<input type="text" class="form-control" id="assunto" name="assunto" placeholder="Digite aqui o assunto">
			</div>
			<div class="form-group col-sm md-form">
				<label for="inputPeriodico">Periódico</label>
				<select class="custom-select" id="periodico" name="periodico">
					@foreach ($periodicos as $periodico)
						<option value="{{ $periodico->id }}">{{ $periodico->titulo }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-sm">
				<label for="inputPagina">Página</label>
				<input type="text" class="form-control" id="pagina" name="pagina" placeholder="Página">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm">
				<label for="inputDataEdicao">Data da Edição</label>
				<input type="text" class="form-control datepicker" id="data_edicao" name="data_edicao" placeholder="Data da Edição">
			</div>
			<div class="form-group col-sm">
				<label for="inputEdicao">Edição</label>
				<input type="text" class="form-control" id="edicao" name="edicao" placeholder="Edição">
			</div>
			<div class="form-group col-sm">
				<label for="inputDuracaoEdicao">Escolha a Duração da Edição</label>
				<input type="text" class="form-control datepicker" id="duracao_edicao" name="duracao_edicao" placeholder="Duração da Edição">
			</div>
		</div>
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
	<table class="table table-sm table-hover">
		<thead class="stick-head">
			<tr>
				<th scope="col-2">Assunto</th>
				<th scope="col-2">Periódico</th>
				<th scope="col-2">Data da Edição</th>
				<th scope="col-4">Edição</th>
				<th scope="col-2">Duração Edição</th>
				<th scope="col-2">Página</th>
				<th scope="col-2">Resumo</th>
				<th scope="col-2">Comentário</th>
				<th scope="col-2">Criado em:</th>
				<th scope="col-2">Alterado em:</th>
				<th scope="col-2">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($fichas as $ficha)
				<tr>
					<td>{{ $ficha->assunto }}</td>
					<td>{{ \App\Periodico::find($ficha->periodico_id)->titulo }}</td>
					<td>{{ (new \Carbon\Carbon($ficha->data_edicao))->format('d/m/Y') }}</td>
					<td>{{ $ficha->edicao }}</td>
					<td>{{ $ficha->data_edicao->diffInDays($ficha->duracao_edicao) }}</td>
					<td>{{ $ficha->pagina }}</td>
					<td>{{ $ficha->resumo }}</td>
					<td>{{ $ficha->comentario }}</td>
					<td>{{ (new \Carbon\Carbon($ficha->created_at))->format('d/m/Y') }}</td>
					<td>{{ (new \Carbon\Carbon($ficha->updated_at))->format('d/m/Y') }}</td>
					<td>
						<!-- Default dropleft button -->
						<div class="btn-group dropleft">
						<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Clique
						</button>
							<div class="dropdown-menu">
							<!-- Dropdown menu links -->
								<h6 class="dropdown-header">{{ $ficha->assunto }}</h6>
								<a href="" class="dropdown-item" id="editar-item-grid" data-toggle="modal" data-target="#editar-modal" data-whatever="{{ $ficha }}">Editar</a>
								<a href="" class="dropdown-item apagar-item-grid" data-toggle="modal" data-target="#apagar-modal" data-whatever="{{ $ficha }}">Apagar</a>
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
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title black">Editar Ficha</h2>
			</div>
			<form action="{!! route('ficha.update', $ficha) !!}" id="modal-form" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="container col-sm">
					<div class="row">
						<div class="modal-body-assunto form-modal form-group col-md">
							<label for="modal-assunto" class="col-form-label">Assunto:</label>
							<input type="text" class="form-control" id="modal-assunto" value="{{$ficha->assunto}}" name="assunto" placeholder="Digite aqui o assunto da ficha">
						</div>
						<div class="modal-body-periodico form-modal form-group col-md">
							<label for="modal-periodico">Periódico</label>
							<select class="modal-body-periodico form-control custom-select" id="modal-periodico" name="periodico">
								@foreach ($periodicos as $periodico)

									@if ($ficha->periodico_id == $periodico->id)
										<option value="{{ $periodico->id }}" selected>{{ $periodico->titulo }}</option>
									@else
										<option value="{{ $periodico->id }}">{{ $periodico->titulo }}</option>
									@endif
	
								@endforeach
							</select>
						</div>
					</div>
					<div class="row">
						<div class="modal-body-pagina form-modal form-group col-md">
							<label for="modal-pagina">Página</label>
							<input type="text" class="form-control" id="modal-pagina" value="{{$ficha->pagina}}"  name="pagina" placeholder="Digite aqui a página">
						</div>
						<div class="modal-body-data-edicao form-modal form-group col-md">
							<label for="modal-data_edicao">Data da Edição</label>
							<input type="text" class="form-control" id="modal-data_edicao" value="{{$ficha->data_edicao}}" name="data_edicao" placeholder="Digite aqui a Data da Edição">
						</div>
					</div>
					<div class="row">
						<div class="modal-body-edicao form-modal form-group col-md">
							<label for="modal-edicao">Edição</label>
							<input type="text" class="form-control" id="modal-edicao" value="{{$ficha->edicao}}" name="edicao" placeholder="Digite aqui a Edição">
						</div>
						<div class="modal-body-duracao-edicao form-modal form-group col-md">
							<label for="modal-duracao_edicao">Duração da Edição</label>
							<input type="text" class="form-control" id="modal-duracao_edicao" value="{{$ficha->duracao_edicao}}" name="duracao_edicao" placeholder="Digite aqui a duração da Edição">
						</div>
					</div>
				</div>
				<div class="modal-body-resumo form-modal form-group col-md">
					<label for="modal-resumo">Resumo</label>
					<textarea type="text" class="form-control" id="modal-resumo" value="{{$ficha->resumo}}" name="resumo" placeholder="Digite aqui o Resumo"></textarea>
				</div>
				<div class="modal-body-comentario form-modal form-group col-md">
					<label for="modal-comentario">Comentário</label>
					<textarea type="text" class="form-control" id="modal-comentario" value="{{$ficha->comentario}}" name="comentario" placeholder="Digite aqui o Comentário"></textarea>
				</div>
				<div class="form-group col-md">
					<button type="submit" class="btn btn-primary">Atualizar Ficha</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="apagar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title black">Confirma Apagar Ficha?</h2>
			</div>
				<form action="{{ route('ficha.destroy', $ficha) }}" id="modal-form" method="DELETE">
					<div class="form-group col-md">
						<button type="submit" class="btn btn-danger">Sim</button>
						<button type="button" class="btn btn-info" data-dismiss="modal">Não</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection