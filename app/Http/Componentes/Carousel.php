<?php

namespace App\Http\Componentes;

use App\Http\Componentes\Componentes;
use App\Noticia;
use Illuminate\Support\Facades\DB;

class Carousel extends Componentes
{
	public $slidesCarousel;
	public $itemsCarousel;
	
	public function __construct(int $num_items)
	{
		$this->bladeView = 'componentes.carousel';
		$this->slidesCarousel = [];
		$this->obterNoticiasCarousel($num_items);
		parent::__construct();
	}

	public function obterNoticiasCarousel(int $num_itens)
	{
		$noticia = new Noticia;
		$this->itemsCarousel = $noticia->obterItems($num_itens);
		return $this->arrayItemsCarousel($this->itemsCarousel);
	}

	public function arrayItemsCarousel($items)
	{
		foreach($items as $item)
		{
			$slideCarousel = array($item->id, $item->titulo, $item->subtitulo, $item->imagem);
			array_push($this->slidesCarousel, $slideCarousel);
		}
	}

	public function view(): \Illuminate\View\View
	{
		$view = parent::view();
		$carrousel = view($this->bladeView);

		return $view->with('carousel')
			->with('slidesCarousel', $this->slidesCarousel);
	}
}