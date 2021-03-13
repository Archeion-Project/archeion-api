<div class="container col-sm">
	<h1>{!! $noticia->titulo !!}</h1>
	<br>
	<h3>{!! $noticia->subtitulo !!}</h3>
	<br>
	<img class="abrir-noticia" src="{{ url('upload/' . $noticia->filepath) }}">
	<br>
	<p>{!! $noticia->texto !!}</p>
	<a class="inicio" href="{!! route('inicio') !!}">Voltar ao início</a>
</div>
