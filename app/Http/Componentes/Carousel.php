<?php

namespace App\Http\Componentes;

use App\Http\Componentes\Componentes;
use App\Noticia;
use Illuminate\Support\Facades\DB;

class Carousel extends Componentes
{
	public $noticias;
	public $itemsCarousel;
	
	public function __construct(int $num_items)
	{
		$this->bladeView = 'componentes.carousel';
		$this->noticias = Noticia::obterItems()->all();
		parent::__construct();
	}

	public function view(): \Illuminate\View\View
	{
		$view = parent::view();
		$carrousel = view($this->bladeView);

		return $view->with('carousel')
			->with('noticias', $this->noticias);
	}
}