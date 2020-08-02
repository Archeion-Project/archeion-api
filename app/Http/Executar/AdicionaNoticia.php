<?php

namespace App\Http\Executar;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Noticia;

class AdicionaNoticia
{
	private $titulo;
	private $subtitulo;
	private $texto;
	private $imagem;

	public function __construct()
	{
		$this->titulo = request()->titulo;
		$this->subtitulo = request()->subtitulo;
		$this->texto = request()->texto;
		$this->imagem = request()->imagem;
		$this->adicionarNoticia();
	}

	public function adicionarNoticia()
	{
		DB::table('noticias')->insert(
			['titulo' => $this->titulo,
			 'subtitulo' => $this->subtitulo,
			 'texto' => $this->texto,
			 'imagem' => $this->imagem]
		);
	}

	public function view(): \Illuminate\View\View
	{
		// $navbar = view('blocos.navbar');
		// $barraBusca = new BarraBusca($this->termoBusca);
		// $gridResultados = new GridResultados($this->resultadosBusca);
		return view('textoInicial');
		// 	->with('navbar', $navbar)
		// 	->with('barraBusca', $barraBusca->view())
		// 	->with('gridResultados', $gridResultados->view())
		// 	->with('termoBusca', $this->termoBusca)
		// 	->with('resultadosBusca', $this->resultadosBusca)
		// 	->with('wordCount', $this->resultadosBusca->count());
	}

}