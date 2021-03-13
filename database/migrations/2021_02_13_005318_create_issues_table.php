<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('periodico_id')->references('id')->on('periodicos')->nullable();
			$table->string('titulo', 255)->nullable();
			$table->integer('numero_paginas')->nullable();
			$table->string('tipo', 255)->nullable();
			$table->string('periodicidade', 255)->nullable();
			$table->string('data_original')->nullable();
			$table->date('data_inicio', 6)->nullable();
			$table->date('data_termino', 6)->nullable();
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
        Schema::dropIfExists('issues');
    }
}
