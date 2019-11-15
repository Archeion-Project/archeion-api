<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('assunto', 255)->nullable();
            $table->char('periodico', 255)->nullable();
            $table->char('data_edicao', 30)->nullable();
            $table->char('duracao_edicao', 20)->nullable();
            $table->char('pagina', 20)->nullable();
            $table->text('resumo', 1000)->nullable();
            $table->text('comentarios', 1000)->nullable();
            $table->char('edicao', 255)->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichas');
    }
}
