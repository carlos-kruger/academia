<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreinosExerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinos_exercicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo_treino');
            $table->string('exercicio');
            $table->integer('series')->nullable();
            $table->integer('repeticoes')->nullable();
            $table->foreign('codigo_treino')->references('id')->on('treinos')->onDelete('cascade');
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
        Schema::dropIfExists('treinos_exercicios');
    }
}
