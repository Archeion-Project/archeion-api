<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{

	protected $fillable = [
		'titulo', 'subtitulo', 'imagem', 'texto',
	];

	protected $titulo;
	protected $subtitulo;
	protected $imagem;
	protected $texto;

	//Banco de dados

	public function obterItems(int $qtd_noticias)
	{
		return $this::orderBy('updated_at', 'desc')->take($qtd_noticias)->get();
	}

}
