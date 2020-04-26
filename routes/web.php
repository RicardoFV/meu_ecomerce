<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
// listando as produtos na parte inicial , antes de loga 
Route::get('/', 'VendaController@index')->name('home');

Auth::routes();
// ************************************* ROTA DE PARCEIRO ****************************************


// rota de tela cadastro de parceiro
Route::get('/parceiro','ParceiroController@index')->name('parceiro');

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
Route::get('/produto','ProdutoController@index')->name('produto');

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

// listando as produtos na parte inicial , ja logado 
Route::get('/home', 'VendaController@index')->name('home');

