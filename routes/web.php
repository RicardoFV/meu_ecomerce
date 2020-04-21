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
    return view('layouts/layout');
});

// ************************************* ROTA DE PARCEIRO ****************************************

// rota de tela cadastro de parceiro
Route::get('/parceiro','ParceiroController@index');

// rota de cadastro de parceiro
Route::post('/parceiro/cadastrar','ParceiroController@cadastrar')->name('parceiro.cadastrar');

// rota de atualiza de parceiro
Route::post('/parceiro/atualizar/{id}','ParceiroController@atualizar')->name('parceiro.atualizar');

// rota que lista as informações do parceiro
Route::get('/parceiro/listar','ParceiroController@listar')->name('parceiro.listar');

// rota que faz a busca de um parceiro especifico
Route::get('/parceiro/consultar/{id}','ParceiroController@consultar')->name('parceiro.consultar');

// rota que faz a deleção  de um parceiro especifico
Route::get('/parceiro/deletar/{id}','ParceiroController@deletar')->name('parceiro.deletar');


// ************************************* ROTA DE PRODUTO ****************************************

// rota de cadastro do produto
Route::get('/produto','ProdutoController@index');

// rota de cadastro de produto , rota que salva
Route::post('/produto/cadastrar', 'ProdutoController@cadastrar')->name('produto.cadastrar');

// roto que retorna o lista de produtos
Route::get('/produto/listar', 'ProdutoController@listar')->name('produto.listar');

// rota que fazer a consulta do produto 
Route::get('/produto/consultar/{id}', 'ProdutoController@consultar')->name('produto.consultar');

// rota que faz a atualização
Route::post('/produto/atualizar/{id}', 'ProdutoController@atualizar')->name('produto.atualizar');

// rota que faz a deleçao do produto 
Route::get('/produto/deletar/{id}', 'ProdutoController@deletar')->name('produto.deletar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
