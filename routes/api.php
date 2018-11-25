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

Route::group(['prefix'=>'cliente'], function(){
    Route::get('','AlunoController@findAll');
    Route::get('{id}','AlunoController@findById');
    Route::post('', 'AlunoController@save');
    Route::put('{id}', 'AlunoController@atualizar');
});

Route::group(['prefix'=>'profissionais'], function(){
    Route::get('','ProfissionalController@findAll');
    Route::post('', 'ProfissionalController@save');
    Route::put('{id}', 'ProfissionalController@atualizar');
    Route::put('{id}/alterarsenha', 'ProfissionalController@alterarSenha');
});

Route::group(['prefix'=>'avaliacoes'], function(){
    Route::get('','AvaliacaoController@findAll');
    Route::post('', 'AvaliacaoController@save');
    Route::put('{id}', 'AvaliacaoController@atualizar');
    Route::delete('{id}', 'AvaliacaoController@delete');
});
