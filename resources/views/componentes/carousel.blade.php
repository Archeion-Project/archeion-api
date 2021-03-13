<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

	<ol class="carousel-indicators">

		@foreach ($noticias as $noticia)

			<li data-target="#carouselExampleIndicators" data-slide-to="{{ key($noticias) }}" 
			@if (!key($noticias)) class="active" @endif></li>

			@php(next($noticias))

		@endforeach
	</ol>

	<div class="carousel-inner">

		@foreach ($noticias as $noticia)
			<div @if (!key($noticias)) class="carousel-item active" @else class="carousel-item" @endif>
				<img class="d-block w-100" src="{{ url('upload/' . $noticia->filepath) }}" alt="First slide">

				<div class="carousel-caption d-none d-md-block">
					<h5><a class="header-carousel carousel" href="{!! route('noticia.abrir', $noticia) !!}">{{ $noticia->titulo }}</a></h5>
					<p><a class="sub-header-carousel carousel" href="{!! route('noticia.abrir', $noticia) !!}">{{ $noticia->subtitulo }}</a><p>
				</div>
			</div>
			
			@php(next($noticias))
			
		@endforeach

	</div>

	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	</a>

	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
	</a>
	
</div>

<br>
