<div class="footer">

	<!-- Footer -->
	<footer class="page-footer font-small pt-4">

		<!-- Footer Links -->
		<div class="container-fluid text-center text-md-left">

			<!-- Grid row -->
			<div class="row">

			<!-- Grid column -->
			<div class="col-md-6 mt-md-0 mt-3">

				<!-- Content -->
				<a class="footer-brand" href="{{ url('/') }}">
					{{ config('app.name', 'BiblioWeb') }}
				</a>
				<p class="footer">Navegue pelo site do Setor de Memória da Biblioteca Municipal Murilo Mendes</p>

			</div>
			<!-- Grid column -->

			<hr class="clearfix w-100 d-md-none pb-3">

			<!-- Grid column -->
			<div class="col-md-3 mb-md-0 mb-3">

				<!-- Links -->
				<h5 class="text-uppercase">Conteúdo</h5>

				<ul class="list-unstyled">

					<li><a class="footer-link" href="/acervo">Acervo</a></li>
					<li><a class="footer-link" href="/localizacao">Localização</a></li>
					<li><a class="footer-link" href="/sobre">Sobre o projeto</a></li>
					@guest

						<li class="nav-item">
							<a class="footer-link" href="{{ route('login') }}">{{ __('Administração') }}</a>
						</li>

					@endguest

				</ul>

			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-md-3 mb-md-0 mb-3">



			</div>
			<!-- Grid column -->

			</div>
			<!-- Grid row -->

		</div>
		<!-- Footer Links -->

		<!-- Copyright -->
		<div class="text-center py-3">

			<p class="footer">© 2020 Instituto Federal do Sudeste de Minas Gerais</p>

		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->

</div>
