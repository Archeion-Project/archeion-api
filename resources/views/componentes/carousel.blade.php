<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

	<ol class="carousel-indicators">

	@foreach($slidesCarousel as $slide)

		<li @if ($slide[0] == '1') class="active" @endif data-target="#carouselExampleIndicators" data-slide-to="{{ $slide[0] - 1 }}"></li>

	@endforeach
	
	</ol>

	<div class="carousel-inner">

	@foreach($slidesCarousel as $slide)

		<div @if ($slide[0] == '1') class="carousel-item active" @else class="carousel-item" @endif>

			<img class="d-block w-100" src="{{url('img/bmmm.jpg')}}" >
			<div class="carousel-caption d-none d-md-block">
				<a class="header-carousel carousel" href="">{{ $slide[1] }}</a></p>
				<a class="sub-header-carousel carousel" href="">{{ $slide[2] }}</p>
			</div>

		</div>

	@endforeach

	</div>

	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Anterior</span>
	</a>

	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Próximo</span>
	</a>

</div>