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
            $table->string('assunto')->nullable();
            $table->unsignedBigInteger('periodico_id')->nullable();
            $table->date('data_edicao')->nullable();
            $table->date('duracao_edicao')->nullable();
            $table->string('pagina')->nullable();
            $table->text('resumo')->nullable();
            $table->text('comentario')->nullable();
            $table->string('edicao')->nullable();
            $table->timestamp('updated_at')->nullable();
			$table->timestamp('created_at')->nullable();
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
