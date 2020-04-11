<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// rota de cadastro de parceiro
Route::get('/parceiro','ParceiroController@index');
// rota de cadastro de parceiro
Route::post('/parceiro/cadastrar','ParceiroController@cadastrar')->name('parceiro.cadastrar');

// rota de cadastro do produto
Route::get('/produto','ProdutoController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
