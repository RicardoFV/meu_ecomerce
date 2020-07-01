<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ************************************* ROTA DE HOME ****************************************
// listando as produtos na parte inicial , antes de loga 
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

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

// ************************************* ROTA DE CATEGORIA****************************************
Route::get('/categoria', 'CategoriaController@index')->name('categoria');
Route::post('/categoria/cadastrar', 'CategoriaController@store')->name('categoria.cadastrar');
Route::get('/categoria/consultar/{id}', 'CategoriaController@show')->name('categoria.consultar');
Route::get('/categoria/listar', 'CategoriaController@listar')->name('categoria.listar');
Route::post('/categoria/atualizar/{id}', 'CategoriaController@update')->name('categoria.atualizar');
Route::get('/categoria/deletar/{id}','CategoriaController@destroy' )->name('categoria.deletar');

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

// rota de acesso ao cadastro de usuario e cliente
Route::get('/usuario', 'UsuarioController@index')->name('usuario');
// rota que cadastra o novo usuario
Route::post('/usuario/cadastrar', 'UsuarioController@cadastrar')->name('usuario.cadastrar');
// rota que cadastra o novo usuario
Route::post('/usuario/cadastrar/novo_cliente', 'UsuarioController@cadastrarCliente')->name('usuario.cadastrar.cliente');
// listar os usuarios 
Route::get('/usuario/listar','UsuarioController@listar' )->name('usuario.listar');
// rota de consulta
Route::get('/usuario/consultar/{id}', 'UsuarioController@consultar')->name('usuario.consultar');
// rota de atualizar
Route::post('/usuario/atualizar/{id}', 'UsuarioController@atualizar')->name('usuario.atualizar');
// rota de deletar
Route::get('/usuario/deletar/{id}','UsuarioController@deletar')->name('usuario.deletar');

// ************************************* ROTA DE INFORMAÇÃO DE VENDA ************************************

// listando as produtos na parte inicial , ja logado 
Route::get('/home', 'HomeController@index')->name('home');
// listando as informações do produto selecinado
Route::get('/informacao/produto/{id}','HomeController@consultar')->name('informacao.venda');

// ******************ADICIONANDO OS PRODUTOS NO CARRINHO ******************************************
// coloando no carrinho
Route::post('carrinho/cadastrar', 'CarrinhoController@cadastrar')->name('carrinho.cadastrar');
// listar carrinho 
Route::get('carrinho/listar', 'CarrinhoController@listar')->name('carrinho.listar');
// criando a rota de atualizar
Route::post('carrinho/atualizar', 'CarrinhoController@atualizar')->name('carrinho.atualizar');
// rota que deleta o produto
Route::post('carrinho/deletar','CarrinhoController@deletar')->name('carrinho.deletar');
// rota que deleta o produto pendentes
Route::post('carrinho/deleta_pendente','CarrinhoController@deleta_pendente')->name('carrinho.deleta_pendente');
// direcionando para pagamento 
Route::post('carrinho/pagamentoMercadoPago', 'CarrinhoController@pagamentoMercadoPago')->name('pagamento_mercado_pago');

//*************VENDAS PENDENTES*******************************************
Route::get('carrinho/pendentes', 'CarrinhoController@pendentes')->name('carrinho.pendentes');

//*************FINALIZAR VENDA VERIFICANDO SE TEM CADASTRO*******************************************
Route::get('carrinho/finalizar', 'CarrinhoController@finalizar')->name('carrinho.finalizar');

//*************CADASTRO DE CLIENTE*******************************************
Route::get('cliente','ClienteController@index')->name('cliente');
Route::post('cliente/cadastrar', 'ClienteController@cadastrar')->name('cliente.cadastrar');
Route::get('cliente/listar','ClienteController@listar')->name('cliente.listar');

//****************GERAR BOLETO PARA PAGAMENTO**************************************************
Route::post('pagamento/boleto', 'PagamentoMercadoPagoController@gerarBoleto')->name('gerar_boleto');
// pagamento pendente
Route::get('pagamento/aguardando', 'PagamentoMercadoPagoController@aguardandoPagamento')
        ->name('pagamento_boleto_pendente');
// rota para aprovar pagamento 
Route::get('pagamento/aprovar/{id}', 'PagamentoMercadoPagoController@aprovarPagamento')->name('aprovar_pagamento');
// rota para cancelar pagamento
Route::get('pagamento/cancelar/{id}', 'PagamentoMercadoPagoController@cancelarPagamento')->name('cancelar_pagamento');