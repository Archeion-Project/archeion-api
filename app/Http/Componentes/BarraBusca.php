<?php

namespace App\Http\Componentes;

use App\Http\Componentes\Componentes;

class BarraBusca extends Componentes
{

	public $termoBusca;

	public function __construct(?string $termoBusca = null)
	{
		$this->bladeView = 'componentes.barraBusca';
		parent::__construct();
		$this->termoBusca = $termoBusca;
	}

	public function view(): \Illuminate\View\View
	{
		$view = parent::view();
		$barraBusca = view($this->bladeView);

		return $view->with('barraBusca', $barraBusca);
	}
}