@extends('layouts.app')

@section('content')

<div class="container col-sm">
	<form action="{!! route('noticia.update', $noticia) !!}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<br>
		<h2>Editar Notícia: {!! $noticia->titulo !!}</h2>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="titulo">Titulo</label>
				<input type="text" class="form-control" id="titulo" value="{!! $noticia->titulo !!}" name="titulo" placeholder="Digite aqui o título da notícia">
			</div>
			<div class="form-group col-4">
				<label for="status">Status da Publicação</label>
				<select class="form-select" id="status" name="status" value="{!! $noticia->status !!}">
					<option value="{{App\Noticia::OCULTO}}">Oculto</option>
					<option value="{{App\Noticia::PUBLICADO}}" selected>Publicado</option>
				</select>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="subtitulo">Subtítulo</label>
				<input type="text" class="body-subtitulo form-control" id="subtitulo" value="{!! $noticia->subtitulo !!}" name="subtitulo" placeholder="Digite aqui o subtítulo da notícia">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="texto">Texto</label>
				<textarea type="text" class="form-control" id="texto" name="texto" placeholder="Digite aqui a notícia">{!! $noticia->texto !!}</textarea>
			</div>
		</div>

		<!-- Input oculto para a imagem da notícia -->
		<input type="text" class="form-control" id="filepath" name="filepath" hidden>

		<br>
		
		<div class="row">
			<div class="form-group col-sm">
				<h5 class="white">Alterar imagem para a notícia (opcional)</h5>
				<input type="file" name="image" class="image">
			</div>
			<div class="form-group col-sm">
				<h5 class="white">Imagem atual</h5>
				<img src="{{ url('upload/' . $noticia->filepath) }}" width="350" height="200">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<button type="submit" class="btn btn-primary">Cadastrar notícia</button>
			</div>
		</div>
		<br>
	</form>
</div>

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

@endsection
