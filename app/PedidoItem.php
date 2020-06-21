<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PedidoItem extends Model {

    //colocando o nome da tabela
    protected $table = 'pedido_itens';
    // os campos da tabela 
    protected $fillable = [
        'quantidade',
        'valor',
        'pedido_id',
        'produto_id'
    ];

    // cadastrar pedido item 
    public static function cadastraPedidoItem(array $dados) {
        self::create($dados);
    }

    // atualiza pedido 
    public static function atualizaItemPedido($idItem, $qde_desejada, $valorConpraProduto) {
        self::find($idItem)->update(array('quantidade' => $qde_desejada, 'valor' => $valorConpraProduto));
    }

    //deleta o item 
    public static function deletarPedidoItem(PedidoItem $pedidoItem) {
        $pedidoItem->delete();
    }

    // pesquisar pedido retornando o mesmo
    public static function consultarPedidoItem($pedido) {
        return self::where('pedido_id', $pedido)->get();
    }

    // lista todos os pedidosItens
    public static function listarPedidoItem($sessionId) {
        return DB::table('pedido_itens')
                        ->join('produtos', 'pedido_itens.produto_id', '=', 'produtos.id')
                        ->join('pedidos', 'pedido_itens.pedido_id', '=', 'pedidos.id')
                        ->select('pedido_itens.*',
                                'produtos.nome as produtoNome',
                                'produtos.imagem',
                                'produtos.quantidade as produtoQuantidade')
                        ->where('pedido_id', $sessionId)->get();
    }
    // lista os itens por cliente
    public static function listarItensPorCliente($clienteId) {
        return DB::table('pedido_itens')
                        ->join('produtos', 'pedido_itens.produto_id', '=', 'produtos.id')
                        ->join('pedidos', 'pedido_itens.pedido_id', '=', 'pedidos.id')
                        ->join('clientes', 'pedidos.cliente_id', '=', 'clientes.id')
                        ->select('pedido_itens.*',
                                'pedidos.*',
                                'produtos.nome as produtoNome',
                                'produtos.imagem',
                                'produtos.quantidade as produtoQuantidade',
                                'clientes.id as idCliente',
                                'clientes.nome as nomeCliente',
                                'clientes.cpf','clientes.complemento', 'clientes.cep','clientes.logradouro','clientes.bairro',
                                'clientes.localidade','clientes.uf','clientes.email',
                                'clientes.email as emailCliente')
                        ->where('cliente_id', $clienteId)->where('pedidos.status', 'pendente')->get();
    }
    // metodo que busca os itens por pedidoId
    public static function listarItensPorPedidoId($pedidoId) {
        return DB::table('pedido_itens')
                        ->join('produtos', 'pedido_itens.produto_id', '=', 'produtos.id')
                        ->join('pedidos', 'pedido_itens.pedido_id', '=', 'pedidos.id')
                        ->join('clientes', 'pedidos.cliente_id', '=', 'clientes.id')
                        ->select('pedido_itens.*',
                                'pedidos.*',
                                'produtos.nome as produtoNome',
                                'produtos.imagem',
                                'produtos.quantidade as produtoQuantidade',
                                'clientes.id as idCliente',
                                'clientes.nome as nomeCliente',
                                'clientes.cpf','clientes.complemento', 'clientes.cep','clientes.logradouro','clientes.bairro',
                                'clientes.localidade','clientes.uf','clientes.email',
                                'clientes.email as emailCliente')
                        ->where('pedido_id', $pedidoId)->where('pedidos.status', 'aprovado')->get();
    }

}
