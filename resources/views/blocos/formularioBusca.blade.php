<form action="/executaBusca" method="post">
	@csrf
	@method('GET')
	<div class="container">
		<div class="form-group">
			<input type="text" class="form-control" name="termoBusca" placeholder="Busque no acervo" aria-label="Recipient's username" aria-describedby="button-addon2" autofocus>
			<p>Filtrar busca por:</p>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="assunto" value="assunto">
				<label class="form-check-label" for="inlineCheckbox1">Assunto</label>
				<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="periodico" value="periodico">
				<label class="form-check-label" for="inlineCheckbox2">Periódico</label>
				<input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="resumo" value="resumo">
				<label class="form-check-label" for="inlineCheckbox3">Resumo</label>
				<input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="resumo" value="resumo">
				<label class="form-check-label" for="inlineCheckbox3">Resumo</label>
			</div>
			<div>
				<button type="submit" class="btn btn-primary">Pesquisar</button>
			</div>
		</div>
	</div>
</form>
