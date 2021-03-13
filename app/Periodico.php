<?php

namespace App;

use App\Issue;
use Illuminate\Database\Eloquent\Model;

class Periodico extends Model
{

	const JORNAL = 1;
	const REVISTA = 2;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'localizacao', 'titulo', 'imprenta', 'periodicidade', 'forma_fisica', 'idioma', 'fonte_descricao', 'data_criacao', 'data_termino', 'deleted_at',
	];
	
	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'data_criacao' => 'datetime',
		'data_termino' => 'datetime',
		'deleted_at' => 'datetime',
	];

	public function issues()
	{
		return $this->hasMany(Issue::class, 'periodico_id');
	}

}
