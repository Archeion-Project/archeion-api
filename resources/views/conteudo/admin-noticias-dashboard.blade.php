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
			<div class="form-group col-4">
				<label for="inputStatus">Status da Publicação</label>
				<select class="form-select" id="status" name="status">
					<option value="0">Apagado</option>
					<option value="1">Oculto</option>
					<option value="2">Publicado</option>
				</select>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="inputSubtitulo">Subtítulo</label>
				<input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Digite aqui o subtítulo da notícia">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="inputTexto">Texto</label>
				<textarea type="text" class="form-control" id="texto" name="texto" placeholder="Digite aqui a notícia"></textarea>
			</div>
		</div>

		<!-- Input oculto para a imagem da notícia -->
		<input type="text" class="form-control" id="filepath" name="filepath" hidden>

		<br>
		
		<div class="row">
			<div class="form-group col-sm">
				<h5 class="white">Escolha uma imagem para a notícia</h5>
				<input type="file" name="image" class="image">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<button type="submit" class="btn btn-primary">Cadastrar notícia</button>
			</div>
		</div>
	</form>
</div>

<hr/>

<div class="modal fade" id="modal-crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Corte a Imagem</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">x</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<div class="row">
						<div class="col-md-8">
							<img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
						</div>
						<div class="col-md-4">
							<div class="preview"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" id="crop">Crop</button>
			</div>
		</div>
	</div>
</div>

<div class="container col-sm">
	<br>
		<h2>Notícias Cadastradas</h2>
	<br>
	<table class="table table-sm" id="grid-lista">
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
							<a class="dropdown-item" id="editar-item-grid" data-toggle="modal" data-target="#editar-modal" data-whatever="{{ $noticia }}">Editar</a>
							<a class="dropdown-item" id="editar-item-grid" href="{{ route('noticia.destroy', $noticia) }}">Ocultar</a>
							<a class="dropdown-item" id="editar-item-grid" href="{{ route('noticia.destroy', $noticia) }}">Apagar</a>
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
				<h2 class="modal-title black">Editar notícia</h2>
			</div>
			<form action="{!! route('noticia.update', $noticia) !!}" id="modal-form" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="container col-sm">
					<div class="row">
						<div class="modal-body-titulo form-modal form-group col-md">
							<label for="modal-titulo" class="col-form-label">Titulo</label>
							<input type="text" class="form-control" id="modal-titulo" value="{{$noticia->titulo}}" name="titulo" placeholder="Digite aqui o título da notícia">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="modal-body-subtitulo form-modal form-group col-md"">
							<label for="modal-status">Status da Publicação</label>
							<select class="form-select" id="modal-status" name="status" value="{{$noticia->status}}">
								<option value="{{App\Noticia::APAGADO}}">Apagado</option>
								<option value="{{App\Noticia::OCULTO}}">Oculto</option>
								<option value="{{App\Noticia::PUBLICADO}}">Publicado</option>
							</select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="modal-body-subtitulo form-modal form-group col-md">
							<label for="modal-subtitulo">Subtítulo</label>
							<input type="text" class="modal-body-subtitulo form-control" id="modal-subtitulo" value="{{$noticia->subtitulo}}" name="subtitulo" placeholder="Digite aqui o subtítulo da notícia">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="modal-body-texto form-modal form-group col-md">
							<label for="modal-texto">Texto</label>
							<textarea type="text" class="form-control" id="modal-texto" name="texto" placeholder="Digite aqui a notícia"></textarea>
						</div>
					</div>
					<br>
					<div class="form-group col-md">
						<button type="submit" class="btn btn-primary">Atualizar notícia</button>
					</div>
					<br>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection