<?php

namespace Database\Seeds;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent;

class PeriodicosSeeder extends Seeder
{
	public function __construct()
	{
	}

	public function run()
	{
		$listaPeriodicos = $this->getListaPeriodicos();

		foreach ($listaPeriodicos as $item)
		{
			$periodico = new \App\Periodico();
			$periodico->titulo = $item['titulo'];
			$periodico->sigla = $item['sigla'];
			$periodico->forma_fisica = $item['forma_fisica'];
			$periodico->save();
		}

		$periodico = new \App\Periodico();
		$periodico->id = 99999;
		$periodico->titulo = 'Sem Informação';
		$periodico->sigla = NULL;
		$periodico->forma_fisica = NULL;
		$periodico->save();
	}

	private function getListaPeriodicos()
	{
		return [
			[
				'titulo' => 'Actualidade',
				'sigla' => 'AC',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Correio de J. Fora (1)',
				'sigla' => 'CF',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Correio de J. Fora (2)',
				'sigla' => 'CJ',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Correio de Minas',
				'sigla' => 'CM',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Correio da Tarde',
				'sigla' => 'CT',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'A Democracia',
				'sigla' => 'DE',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Diário da Manhã',
				'sigla' => 'DH',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'O Dia',
				'sigla' => 'DI',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Diário de Minas',
				'sigla' => 'DM',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Diário do Povo',
				'sigla' => 'DP',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Gazeta de Juiz de Fora',
				'sigla' => 'GJ',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Gazeta da Tarde',
				'sigla' => 'GT',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Jornal do Commercio',
				'sigla' => 'JC',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Juiz de Fora',
				'sigla' => 'JF',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Lar Católico',
				'sigla' => 'LC',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'O Lidador',
				'sigla' => 'LI',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Minas Livre',
				'sigla' => 'ML',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Parahybuna',
				'sigla' => 'PA',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'A Propaganda',
				'sigla' => 'PR',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Regeneração',
				'sigla' => 'RE',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Diário da Tarde (1)',
				'sigla' => 'T1',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'Diário da Tarde (2)',
				'sigla' => 'T2',
				'forma_fisica' => '1',
			],
			[
				'titulo' => 'O Lince',
				'sigla' => NULL,
				'forma_fisica' => '2',
			],
			[
				'titulo' => 'Evolução',
				'sigla' => NULL,
				'forma_fisica' => '2',
			],
			[
				'titulo' => 'Marília',
				'sigla' => NULL,
				'forma_fisica' => '2',
			],
			[
				'titulo' => 'Luz',
				'sigla' => NULL,
				'forma_fisica' => '2',
			],
			[
				'titulo' => 'Silhueta',
				'sigla' => 'SI',
				'forma_fisica' => '2',
			],
			[
				'titulo' => 'Panorama',
				'sigla' => 'PN',
				'forma_fisica' => '2',
			],
			[
				'titulo' => 'Diário Mercantil',
				'sigla' => 'DM',
				'forma_fisica' => '2',
			],
			[
				'titulo' => 'Gazeta Commercial',
				'sigla' => 'GC',
				'forma_fisica' => '2',
			],

		];
	}
}
