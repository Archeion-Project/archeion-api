<?php

namespace App;

use App\Pages;
use App\Periodico;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{

	const DIARIO = 1;
	const SEMANAL = 2;
	const QUINZENAL = 3;
	const MENSAL = 4;
	const BIMESTRAL = 5;
	const TRIMESTRAL = 6;
	const QUADRIMESTRAL = 7;
	const SEMESTRAL = 8;
	const ANUAL = 9;
	const BIENAL = 10;
	const AVULSO = 999;
	const INDETERMINADO = NULL;

	protected $fillable = [
		'titulo', 'numero_paginas', 'forma_fisica', 'tipo', 'periodicidade', 'data_inicio', 'data_termino', 'periodico_id',
	];

		/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'data_inicio' => 'datetime',
		'data_termino' => 'datetime',
	];

	public function periodico()
	{
		return $this->belongsTo(Periodico::class);
	}

	public function pages()
	{
		return $this->hasMany(Page::class, 'issue_id');
	}
}
