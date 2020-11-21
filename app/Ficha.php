<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'assunto', 'periodico', 'data_edicao', 'duracao_edicao', 'pagina', 'resumo', 'comentario', 'edicao', 'updated_at', 'crated_at',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'data_edicao' => 'datetime',
	];
}
