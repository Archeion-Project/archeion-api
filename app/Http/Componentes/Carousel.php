<?php

namespace App\Http\Componentes;

use App\Http\Componentes\Componentes;
use Illuminate\Support\Facades\DB;

class Carousel extends Componentes
{
	public $slidesCarousel;
	
	public function __construct()
	{
		$this->bladeView = 'componentes.carousel';
		$this->slidesCarousel = [];
		$this->itemsCarousel();
		parent::__construct();
	}

	public function obterItemsCarousel()
	{
		return DB::select('select * from noticias limit 3');
	}

	public function itemsCarousel()
	{
		foreach($this->obterItemsCarousel() as $item)
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