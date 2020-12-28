<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeds\FichasTableSeeder;
use Database\Seeds\NoticiasTableSeeder;
use Database\Seeds\PeriodicosSeeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call(PeriodicosSeeder::class);
		$this->call(FichasTableSeeder::class);
		$this->call(NoticiasTableSeeder::class);
		Model::reguard();
	}
}