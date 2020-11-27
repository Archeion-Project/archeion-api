@extends('layouts.app')
{!! view('blocos.navbar') !!}

<div class="container col-sm">
	<form action="{!! route('noticia.store') !!}" method="post">
		@csrf
		@method('POST')
		<br>
		<h2>Adicionar notícia</h2>
		<br>
		<div class="form-group col-sm">
			<label for="inputTitulo">Título</label>
			<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite aqui o título da notícia">
		</div>
		<div class="form-group col-sm">
			<label for="inputSubtitulo">Subtítulo</label>
			<input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Digite aqui o subtítulo da notícia">
		</div>
		<div class="form-group col-sm">
			<label for="inputTexto">Texto</label>
			<textarea type="text" class="form-control" id="texto" name="texto" placeholder="Digite aqui a notícia"></textarea>
		</div>
		<div>
			<button type="submit" class="btn btn-primary">Cadastrar notícia</button>
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
							<a class="dropdown-item editar-noticia" href="#">Editar</a>
							<a class="dropdown-item apagar-noticia" href="#">Apagar</a>
						</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>