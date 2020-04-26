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
// ************************************* ROTA DE HOME ****************************************
// listando as produtos na parte inicial , antes de loga 
Route::get('/', 'VendaController@index')->name('home');

Auth::routes();
// listando as produtos na parte inicial , ja logado 
Route::get('/home', 'VendaController@index')->name('home');

// ************************************* ROTA DE PARCEIRO ****************************************
// rota de tela cadastro de parceiro
Route::get('/parceiro', 'ParceiroController@index')->name('parceiro');

// rota de cadastro de parceiro
Route::post('/parceiro/cadastrar', 'ParceiroController@cadastrar')->name('parceiro.cadastrar');

// rota de atualiza de parceiro
Route::post('/parceiro/atualizar/{id}', 'ParceiroController@atualizar')->name('parceiro.atualizar');

// rota que lista as informações do parceiro
Route::get('/parceiro/listar', 'ParceiroController@listar')->name('parceiro.listar');

// rota que faz a busca de um parceiro especifico
Route::get('/parceiro/consultar/{id}', 'ParceiroController@consultar')->name('parceiro.consultar');

// rota que faz a deleção  de um parceiro especifico
Route::get('/parceiro/deletar/{id}', 'ParceiroController@deletar')->name('parceiro.deletar');

// ************************************* ROTA DE PRODUTO ****************************************
// rota de cadastro do produto
Route::get('/produto', 'ProdutoController@index')->name('produto');

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

// ************************************* ROTA DE CADASTRO DE UM NOVO USUARIO ****************************************

// rota de acesso ao cadastro de usuario 
Route::get('/usuario', 'UsuarioController@index')->name('usuario');
// rota que cadastra o novo usuario
Route::post('/usuario/cadastrar', 'UsuarioController@cadastrar')->name('usuario.cadastrar');
// listar os usuarios 
Route::get('/usuario/listar','UsuarioController@listar' )->name('usuario.listar');
// rota de consulta
Route::get('/usuario/consultar/{id}', 'UsuarioController@consultar')->name('usuario.consultar');
// rota de atualizar
Route::post('/usuario/atualizar/{id}', 'UsuarioController@atualizar')->name('usuario.atualizar');
// rota de deletar
Route::get('/usuario/deletar/{id}','UsuarioController@deletar')->name('usuario.deletar');