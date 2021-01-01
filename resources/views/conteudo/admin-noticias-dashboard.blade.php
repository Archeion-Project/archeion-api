@extends('layouts.app')

@section('content')

<div class="container col-sm">
	<form action="{!! route('noticia.store') !!}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('POST')
		<br>
		
		<div class="alert alert-success" style="display: {!! $confirmaSalvar !!};" id="div-confirmacao" role="alert">
			  Notícia cadastrada com sucesso!
		</div>
		<h2>Adicionar Notícia</h2>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="inputTitulo">Título</label>
				<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite aqui o título da notícia">
			</div>
			<div class="form-group col-sm md-form">
				<label for="inputStatus">Status da Publicação</label>
				<select class="custom-select" id="status" name="status">
					<option value="0">Apagado</option>
					<option value="1">Oculto</option>
					<option value="2">Publicado</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm">
				<label for="inputSubtitulo">Subtítulo</label>
				<input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Digite aqui o subtítulo da notícia">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm">
				<label for="inputTexto">Texto</label>
				<textarea type="text" class="form-control" id="texto" name="texto" placeholder="Digite aqui a notícia"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm">
				<strong>Escolha uma imagem</strong>
				<button class="btn btn-primary" type="file" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="imagem" name="imagem">
				    Button with data-target
				 </button>
				<input type="file" value="Clique aqui" id="imagem" name="imagem">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm">
				<button type="submit" class="btn btn-primary">Cadastrar notícia</button>
			</div>
		</div>
	</form>
</div>

<div class="container col-sm">
	<br>
		<h2>Notícias Cadastradas</h2>
	<br>
	<table class="table table-sm table-hover">
		<thead class="stick-head">
			<tr>
				<th scope="col-2">Titulo</th>
				<th scope="col-2">Subtitulo</th>
				<th scope="col-2">Texto</th>
				<th scope="col-4">Imagem</th>
				<th scope="col-4">Status</th>
				<th scope="col-2">Criado em:</th>
				<th scope="col-2">Alterado em:</th>
				<th scope="col-2">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($noticias as $noticia)
				<tr>
					<td>{{ $noticia->titulo }}</td>
					<td>{{ $noticia->subtitulo }}</td>
					<td>{{ $noticia->texto }}</td>
					<td>{{ $noticia->imagem }}</td>
					<td>{{ $noticia->getStatus() }}</td>
					<td>{{ (new \Carbon\Carbon($noticia->created_at))->format('d/m/Y') }}</td>
					<td>{{ (new \Carbon\Carbon($noticia->updated_at))->format('d/m/Y') }}</td>
					<td>
						<!-- Default dropleft button -->
						<div class="btn-group dropleft">
						<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Clique
						</button>
						<div class="dropdown-menu">
						<!-- Dropdown menu links -->
							<h6 class="dropdown-header">{{ $noticia->titulo }}</h6>
							<a class="dropdown-item editar-item-grid" data-toggle="modal" data-target="#editarModal" data-whatever="{{ $noticia }}">Editar</a>
							<a class="dropdown-item ocultar-item-grid" href="{{ route('noticia.destroy', $noticia) }}">Ocultar</a>
							<a class="dropdown-item apagar-item-grid" href="{{ route('noticia.destroy', $noticia) }}">Apagar</a>
						</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Editar Modal -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title black">Editar notícia</h2>
			</div>
			<form action="{!! route('update-noticia', $noticia->id) !!}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="modal-body-titulo form-group col-md">
				<label for="modal-titulo" class="col-form-label">Recipient:</label>
					<input type="text" class="form-control" id="modal-titulo" value="{{$noticia->titulo}}" name="titulo" placeholder="Digite aqui o título da notícia">
				</div>
				<div class="modal-body-subtitulo form-group col-md"">
					<label for="inputPeriodico">Status da Publicação</label>
					<select class="custom-select" id="periodico" name="periodico">
						<option value="0">Apagado</option>
						<option value="1">Oculto</option>
						<option value="2">Publicado</option>
					</select>
				</div>
				<div class="modal-body-subtitulo form-group col-md">
					<label for="modal-subtitulo">Subtítulo</label>
					<input type="text" class="modal-body-subtitulo form-control" id="modal-subtitulo" value="{{$noticia->subtitulo}}" name="subtitulo" placeholder="Digite aqui o subtítulo da notícia">
				</div>
				<div class="modal-body-texto form-group col-md">
					<label for="modal-texto">Texto</label>
					<textarea type="text" class="form-control" id="modal-texto" name="texto" placeholder="Digite aqui a notícia"></textarea>
				</div>
				<div class="form-group col-md">
					<strong>Escolha uma imagem</strong>
					<input type="file" value="Clique aqui" id="imagem" name="imagem">
				</div>
				<div class="form-group col-md">
					<button type="submit" class="btn btn-primary">Atualizar notícia</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection