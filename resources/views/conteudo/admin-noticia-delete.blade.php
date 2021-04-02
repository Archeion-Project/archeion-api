@extends('layouts.app')

@section('content')

<div class="container col-sm">
	<form action="{{ route('noticia.destroy', $noticia->id) }}" id="modal-form" method="DELETE">
		@csrf
		@method('DELETE')
		<br>
		<h2>Apagar Notícia: {!! $noticia->titulo !!}</h2>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="titulo">Titulo</label>
				<input type="text" class="form-control" id="titulo" value="{!! $noticia->titulo !!}" name="titulo" placeholder="Digite aqui o título da notícia" readonly>
			</div>
			<div class="form-group col-4">
				<label for="status">Status da Publicação</label>
				<select class="form-select" id="status" name="status" value="{!! $noticia->status !!}" disabled>
					<option value="{{App\Noticia::OCULTO}}">Oculto</option>
					<option value="{{App\Noticia::PUBLICADO}}" selected>Publicado</option>
				</select>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="subtitulo">Subtítulo</label>
				<input type="text" class="body-subtitulo form-control" id="subtitulo" value="{!! $noticia->subtitulo !!}" name="subtitulo" placeholder="Digite aqui o subtítulo da notícia" readonly>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="texto">Texto</label>
				<textarea type="text" class="form-control" id="texto" name="texto" placeholder="Digite aqui a notícia" readonly>{!! $noticia->texto !!}</textarea>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="form-group col-sm">
				<h5 class="white">Imagem</h5>
				<img src="{{ url('upload/' . $noticia->filepath) }}" width="350" height="200">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-md">
				<button type="submit" class="btn btn-danger">Apagar</button>
				<button type="button" class="btn btn-secondary"><a class="button-link" href="{{ route('noticia.create') }}">Cancelar</a></button>
			</div>
		</div>
	</form>
	<br>
</div>

@endsection
