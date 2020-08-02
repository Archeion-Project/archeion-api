<form action="/adicionar_noticia" method="post">
	@csrf
	@method('GET')
	<br>
	<h2>Adicionar notícia</h2>
	<br>
	<div class="form-group">
		<label for="exampleInputEmail1">Título</label>
		<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite aqui o título da notícia">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Subtítulo</label>
		<input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Digite aqui o subtítulo da notícia">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Texto</label>
		<textarea type="txt" class="form-control" id="texto" name="texto" placeholder="Digite aqui a notícia"></textarea>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Cadastrar notícia</button>
	</div>
</form>