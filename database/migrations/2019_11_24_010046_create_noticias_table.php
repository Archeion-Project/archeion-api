<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noticias', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->char('titulo', 255)->nullable();
			$table->char('subtitulo', 255)->nullable();
			$table->char('imagem', 30)->nullable();
			$table->text('texto', 2000)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('noticias');
	}
}
