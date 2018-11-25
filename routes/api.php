<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'alunos'], function(){
    Route::get('','AlunoController@findAll');
    Route::get('{id}','AlunoController@findById');
    Route::post('', 'AlunoController@save');
    Route::put('{id}', 'AlunoController@atualizar');
    Route::put('{id}/alterar-status', 'AlunoController@ativarInativar');
});

Route::group(['prefix'=>'treinos'], function(){
    Route::get('','TreinoController@findAll');
    Route::get('{id}','TreinoController@findById');
    Route::get('{id}/exercicios','TreinoController@buscaExercicios');
    Route::put('{id}','TreinoController@atualizar');
    Route::put('{id}/alterar-status','TreinoController@ativarInativar');
    Route::post('','TreinoController@save');
    Route::delete('{id}','TreinoController@delete');
});

Route::group(['prefix'=>'avaliacoes'], function(){
    Route::get('','AvaliacaoController@findAll');
    Route::post('', 'AvaliacaoController@save');
    Route::put('{id}', 'AvaliacaoController@atualizar');
    Route::delete('{id}', 'AvaliacaoController@delete');
});
