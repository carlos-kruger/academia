<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('aluno');
})->middleware('auth');

Route::get('/alunos', function() {
    return view('aluno');
})->middleware('auth');

Route::get('/profissionais', function() {
    return view('profissional');
})->middleware('auth');

Route::get('/avaliacoes', function() {
    return view('avaliacao');
})->middleware('auth');

Route::get('/treinos', function() {
    return view('treino');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
