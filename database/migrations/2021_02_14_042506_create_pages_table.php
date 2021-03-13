<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('issue_id')->references('id')->on('issues')->nullable();
			$table->integer('numero')->nullable();
			$table->string('filepath', 255)->nullable();
			$table->text('conteudo')->nullable();
			$table->dateTime('deleted_at', 6)->nullable();
            $table->timestamps();
        });
	}
	
	// Artisan::call('db:seed', [
    //     '--class' => ThemesTableSeeder::class
    // ]);

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
