<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo_aluno');
            $table->integer('codigo_instrutor');            
            $table->integer('status')->default(1);
            $table->foreign('codigo_aluno')->references('id')->on('alunos');
            $table->foreign('codigo_instrutor')->references('id')->on('users');            
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
        Schema::dropIfExists('treinos');
    }
}
