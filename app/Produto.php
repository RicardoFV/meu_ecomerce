<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //campos que serão inseridos
    protected $fillable = [
        'ativo',
        'nome', 
        'descricao',
        'preco',
        'quantidade',
        'parceiro_id',
        'imagem',
        'usuario_id'   
    ];
    
   // atualiza a quantidade de produtos quando e comprado a primeira vez
    public static function atualizarProduto($id, $qde_desejada) {
        //consulta o produto 
        $produto = Produto::find($id);
        // passa a quantidade para outra variavel
        $qtde_atual = $produto->quantidade;
        //novo valor recebe a subtração
        $novaQtde = $qtde_atual - $qde_desejada;
        // passa o valor para o objeto quantidade 
        $produto->quantidade = $novaQtde;
        // atualiza a quantidade 
        $produto->push();
    }
    // corrige o estoque em caso de pedido subtraido 
    public static function voltarProEstoque($id, $qtde_sobra) {
         //consulta o produto 
        $produto = Produto::find($id);
       // passa a quantidade para outra variavel
        $qtde_atual = $produto->quantidade;
        //novo valor recebe a subtração
        $novaQtde = $qtde_atual + $qtde_sobra;
        // passa o valor para o objeto quantidade 
        $produto->quantidade = $novaQtde;
        // atualiza a quantidade 
        $produto->push();
    }
    // retorna os produtos , fazendo a consulta
    public static function consultarProduto($produto_id) {
        return self::where('id', $produto_id)->get();
    }
    
    // corrige o estoque em caso de pedido subtraido 
    public static function retirarValorEstoque($id, $qtde_sobra) {
         //consulta o produto 
        $produto = Produto::find($id);
       // passa a quantidade para outra variavel
        $qtde_atual = $produto->quantidade;
        //novo valor recebe a subtração
        $novaQtde = $qtde_atual - $qtde_sobra;
        // passa o valor para o objeto quantidade 
        $produto->quantidade = $novaQtde;
        // atualiza a quantidade 
        $produto->push();
    }
}
