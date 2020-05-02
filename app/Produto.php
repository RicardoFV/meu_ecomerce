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
    
   // atualiza a quantidade de produtos 
    public static function atualizarProduto($id, $qtde_desejada) {
        //consulta o produto 
        $produto = Produto::find($id);
        // passa a quantidade para outra variavel
        $qtde_atual = $produto->quantidade;
        //novo valor recebe a subtração
        $novaQtde = $qtde_atual - $qtde_desejada;
        // passa o valor para o objeto quantidade 
        $produto->quantidade = $novaQtde;
        // atualiza a quantidade 
        $produto->push();
    }
}
