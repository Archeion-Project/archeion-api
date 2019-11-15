<?php

namespace Http\Componentes;

class BarraBusca
{

	public $bladeView = 'componentes.barraBusca';
	public $termoBusca;

	public function __construct(string $termoBusca)
	{
		$this->termoBusca = $termoBusca;
		$this->view();
	}

	public function view()
	{
		return view($bladeView);
	}

}