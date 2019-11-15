<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichasTableSeeder extends Seeder {

	public function __construct()
	{
	}

	public function run()
	{
		Eloquent::unguard();
		
		DB::unprepared(file_get_contents(base_path('fichas.sql')));
		$this->command->info('Fichas table seeded!');
	}
}