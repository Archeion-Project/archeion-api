<div class="barraBusca">
	<form action="/executaBusca" method="post">
		@csrf
		@method('GET')
		<div class="row justify-content-center">
			<div class="col-8">
				<input type="text" class="form-control" name="termoBusca" placeholder="Busque no acervo" aria-label="Recipient's username" aria-describedby="button-addon2" autofocus>
				<br>
				<button type="submit" class="btn btn-primary">Pesquisar</button>
			</div>
		</div>
	</form>
</div>