<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodicos', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->char('localizacao', 255)->nullable();
			$table->char('titulo', 255)->nullable();
			$table->char('imprenta', 255)->nullable();
			$table->char('sigla', 16)->nullable();
			$table->char('forma_fisica', 1)->nullable();
			$table->char('idioma', 1)->nullable();
			$table->char('fonte_descricao', 1)->nullable();
			$table->dateTime('data_criacao', 6)->nullable();
			$table->dateTime('data_termino', 6)->nullable();
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
        Schema::dropIfExists('periodicos');
    }
}
