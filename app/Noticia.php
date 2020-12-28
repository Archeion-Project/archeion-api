<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Noticia extends Model
{

	const APAGADO = 0;
	const OCULTO = 1;
	const PUBLICADO = 2;

	protected $fillable = [
		'titulo', 'subtitulo', 'imagem', 'texto', 'status',
	];

	protected $titulo;
	protected $subtitulo;
	protected $imagem;
	protected $texto;

	//Banco de dados

	static public function obterItems()
	{
		return Noticia::where('status', self::PUBLICADO)->orderBy('updated_at', 'desc')->limit(5)->get();
	}

	public function getStatus()
	{
		$texto = null;

		if ($this->status == self::APAGADO)
		{
			$texto = 'Apagado';
		}
		elseif ($this->status == self::OCULTO)
		{
			$texto = 'Oculto';
		}
		elseif ($this->status == self::PUBLICADO)
		{
			$texto = 'Publicado';
		}

		return $texto;
	}

}
