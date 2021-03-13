<?php

namespace App\Http\Controllers;

use App\Http\Componentes\BarraBusca;
use App\Http\Componentes\Carousel;
use App\Http\Executar\PesquisaFicha;
use Illuminate\Http\Request;
use App\Noticia;
use App\Http\Controllers\BibliowebController;

class InicialController extends BibliowebController
{

	public $conteudoTela;
	public $navbar;
	public $footer;

	public function __construct()
	{
		$this->navbar = view('blocos.navbar');
		$this->footer = view('componentes.footer');
		$this->conteudoTela = view('index')
			->with('navbar', $this->navbar)
			->with('footer', $this->footer);
	}

	public function index()
	{
		$titulo = view('conteudo.textoInicial');
		$barraBusca = new BarraBusca();
		$carousel = new Carousel(5);

		return $this->conteudoTela
			->with('titulo', $titulo)
			->with('barraBusca', $barraBusca->view())
			->with('carousel', $carousel->view());
	}

	public function acervo()
	{
		$acervo = view('conteudo.acervo');

		return $this->conteudoTela
			->with('conteudo', $acervo);
	}

	public function localização()
	{
		$localizacao = view('conteudo.localizacao');

		return $this->conteudoTela
			->with('conteudo', $localizacao);
	}

	public function sobre()
	{
		$sobre = view('conteudo.sobre');

		return $this->conteudoTela
			->with('conteudo', $sobre);
	}

	public function abrirNoticia(Noticia $noticia)
	{
		$abrirNoticia = view('conteudo.abrir-noticia')
			->with('noticia', $noticia);

		return $this->conteudoTela
			->with('conteudo', $abrirNoticia);
	}

	public function buscar()
	{
		$pesquisaFicha = new PesquisaFicha(request()->termoBusca);

		return $pesquisaFicha->view();
	}

}