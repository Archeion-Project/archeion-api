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
			$table->text('texto', 2000)->nullable();
			$table->char('status', 1)->nullable();
			$table->char('filepath', 255)->nullable();
			$table->dateTime('deleted_at', 6)->nullable();
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
