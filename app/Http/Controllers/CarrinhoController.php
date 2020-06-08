<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\PedidoItem;
use App\Produto;
use App\Cliente;

class CarrinhoController extends Controller {

    // e necessario esta logado 
    public function __construct() {
        $this->middleware('auth');
    }

    public function listar() {
        // recebe a session
        $sessionId = session()->getId();
        // faz a consulta , para ver se existe essa session
        $pedidoOId = Pedido::consultarPedidoPorSessio($sessionId);

        /*
          if (empty($pedidoOId)) {
          // direciona para a home
          return redirect()->route('home');
          }
         */
        // lista todos os itens do pedido
        $carrinhoItem = PedidoItem::listarPedidoItem($pedidoOId);
        return view('venda.carrinho')->with('carrinhoItens', $carrinhoItem);
    }

    //controller responsavel por montar o carrinho
    public function cadastrar(Request $request) {

        // pega a session do navegador 
        $sessionId = session()->getId();
        $this->middleware('VerifyCsrfToken');
        // passa os valores para as variaveis 
        $produto_id = $request->input('produto_id');
        $qde_desejada = $request->input('quantidade');
        // faz a busca do produto pelo o id
        $produto = Produto::find($produto_id);
        // calcuala o valor do produto 
        $valorConpraProduto = $produto->preco * $qde_desejada;

        //verfiica se o produto não esta vazio
        if (empty($produto)) {
            // manda uma mensagem de erro
        }
        // faz a consulta do pedido pelo id da session
        $pedidoId = Pedido::consultarPedidoPorSessio($sessionId);
        //se o pedidoId viee vazio, significa que o pedido não existe, então insere
        if (empty($pedidoId)) {
            // verifico se tem cadastro de cliente
            $cliente = Cliente::consultarPorUsuario(auth()->user()->id);
            // verifico se tem cliente cadastrado
            if (!isset($cliente)) { 
              // envia para a tela de cadastro de cliente
                return view('cadastro.cliente')->with('pedido', $pedidoId);
            } else {
                // faz o cadastro 
                Pedido::cadastrarPedido($sessionId, $cliente['id']);
                // faz a consulta do pedido pelo id da session
               // $pedidoId = Pedido::consultarPedidoPorSessio($sessionId);
            }
        }
        // faz a consulta do pedido pelo id da session
        $pedidoId = Pedido::consultarPedidoPorSessio($sessionId);
        // verifica se o pedidoItem ja esta cadastrado
        $pedidoItem = PedidoItem::where([
                    'produto_id' => $produto_id,
                    'pedido_id' => $pedidoId,
                ])->first(['id', 'quantidade']);
        // caso se vier vazio , adiciona
        if (empty($pedidoItem)) {
            // passa os valores para a variavel
            $dados = [
                'quantidade' => $qde_desejada,
                'valor' => $valorConpraProduto,
                'pedido_id' => $pedidoId,
                'produto_id' => $produto_id,
            ];
            //cadastra o novo pedidoitem
            PedidoItem::cadastraPedidoItem($dados);
            // atualiza a quantidade 
            Produto::atualizarProduto($produto_id, $qde_desejada);
        } else { // se o pedidoItem e o produto for o mesmo, então atualiza 
            // consulta o pedido item 
            $item = PedidoItem::find($pedidoItem->id);
            // passa a quantidade que esta no banco 
            $qde_registrada = $item->quantidade;
            if ($qde_desejada < $qde_registrada) {
                // faz a subtracao 
                $qtde_sobra = $qde_registrada - $qde_desejada;
                // corrigi o estoque 
                Produto::voltarProEstoque($produto_id, $qtde_sobra);
                //atuazlia o pedidoItem
                PedidoItem::atualizaItemPedido($pedidoItem->id, $qde_desejada, $valorConpraProduto);
            } else if ($qde_desejada > $qde_registrada) {
                // faz a subtracao 
                $qtde_sobra = $qde_registrada - $qde_desejada;
                // corrigi o estoque 
                Produto::retirarValorEstoque($produto_id, $qtde_sobra);
                //atuazlia o pedidoItem
                PedidoItem::atualizaItemPedido($pedidoItem->id, $qde_desejada, $valorConpraProduto);
            }
        }
        // vai para o carrinho 
        return redirect()->route('carrinho.listar');
    }

    public function atualizar(Request $request) {
        // faz a busca a session
        $sessionId = session()->getId();
        //verifica se tem a session
        $pedidoId = Pedido::consultarPedidoPorSessio($sessionId);
        //verifica se não veio vazio
        if (empty($pedidoId)) {
            // faz alguma acao
        }
        // recebe os dados da tela 
        $produtoId = $request->input('produto_id');
        $qde_desejada = $request->input('quantidade');
        $itemPedido = $request->input('item_pedido');
        // faz a busca do produto
        $produto = Produto::find($produtoId);
        // calcuala o valor do produto 
        $valorConpraProduto = $produto->preco * $qde_desejada;

        //se quantidade maior que zero
        if ($qde_desejada > 0) {
            // consulta o pedido item 
            $item = PedidoItem::find($itemPedido);
            // passa a quantidade que esta no banco 
            $qde_registrada = $item->quantidade;

            if ($qde_desejada < $qde_registrada) {
                // faz a subtracao 
                $qtde_sobra = $qde_registrada - $qde_desejada;
                // corrigi o estoque 
                Produto::voltarProEstoque($produtoId, $qtde_sobra);
                //atuazlia o pedidoItem
                PedidoItem::atualizaItemPedido($itemPedido, $qde_desejada, $valorConpraProduto);
            } else if ($qde_desejada > $qde_registrada) {
                // faz a subtracao 
                $qtde_sobra = $qde_desejada - $qde_registrada;
                // corrigi o estoque 
                Produto::retirarValorEstoque($produtoId, $qtde_sobra);
                //atuazlia o pedidoItem
                PedidoItem::atualizaItemPedido($itemPedido, $qde_desejada, $valorConpraProduto);
            }
        }
        // vai para o carrinho 
        return redirect()->route('carrinho.listar');
    }

    public function deleta_pendente(Request $request) {
        // recebe os dados da tela
        $pedidoId = $request->input('pedido_id');
        $produtoId = $request->input('produto_id');
        $pedidoitemId = $request->input('pedido_item');
        $quantidade_escolhidade = $request->input('quantidade_escolhidade');
        // pesquisa o pedidoItem
        $pedidoItem = PedidoItem::find($pedidoitemId);

        //chama o metodo que retorna quantidade de produtos
        Produto::voltarProEstoque($produtoId, $quantidade_escolhidade);
        // deleta o pedidoItem
        PedidoItem::deletarPedidoItem($pedidoItem);

        // pesquisa o pedido
        $pedido = Pedido::find($pedidoId);

        // pesquisa o pedidoItem com base pedido_id 
        $pedidoItens = PedidoItem::where('pedido_id', $pedido->id)->first();

        // caso o produto vinculado nao esteja no pedidoitens
        if (!isset($pedidoItens)) {
            // deleta o pedido
            Pedido::deletarPedido($pedido);
            // vai para a home 
            return redirect()->route('home');
        }
        // vai para o carrinho 
        return redirect()->route('carrinho.finalizar');
    }

    public function deletar(Request $request) {
        // faz a busca a session
        $sessionId = session()->getId();
        //verifica se tem a session
        $pedidoId = Pedido::consultarPedidoPorSessio($sessionId);
        //verifica se não veio vazio
        if (empty($pedidoId)) {
            // faz alguma acao
        }
        // recebe os dados da tela
        $produtoId = $request->input('produto_id');
        $pedidoitemId = $request->input('pedido_item');
        $quantidade_escolhidade = $request->input('quantidade_escolhidade');
        // pesquisa o pedidoItem
        $pedidoItem = PedidoItem::find($pedidoitemId);

        //chama o metodo que retorna quantidade de produtos
        Produto::voltarProEstoque($produtoId, $quantidade_escolhidade);
        // deleta o pedidoItem
        PedidoItem::deletarPedidoItem($pedidoItem);

        // pesquisa o pedido
        $pedido = Pedido::find($pedidoId);

        // pesquisa o pedidoItem com base pedido_id 
        $pedidoItens = PedidoItem::where('pedido_id', $pedido->id)->first();

        // caso o produto vinculado nao esteja no pedidoitens
        if (!isset($pedidoItens)) {
            // deleta o pedido
            Pedido::deletarPedido($pedido);
            // vai para a home 
            return redirect()->route('home');
        }
        // vai para o carrinho 
        return redirect()->route('carrinho.listar');
    }

    public function finalizar() {
        if (auth()->check()) {
            // verifico se tem cadastro de cliente
            $cliente = Cliente::consultarPorUsuario(auth()->user()->id);
            // se existir cliente
            if (isset($cliente)) {
                // pesquisa os  itens no carrinho
                $itens = PedidoItem::listarItensPorCliente($cliente['id']);

                // retorna pra view
                return view('venda.finalizar_venda', [
                    'itens' => $itens
                ]);
            } else {
                // pega a sessao 
                $sessao_id = session()->getId();
                //consulta a sessao
                $pedido = Pedido::consultarPedidoPorSessio($sessao_id);
                // atualizar a sessao 
                Pedido::atualizarSessao($pedido, $sessao_id);
                // envia para a tela de cadastro de cliente
                return view('cadastro.cliente')->with('pedido', $pedido);
            }
        } else {
            // pega a sessao 
            $sessao_id = session()->getId();
            //consulta a sessao
            $pedido = Pedido::consultarPedidoPorSessio($sessao_id);
            // verifica se tem se tem session 
            if ($pedido) {
                // retorna a sessao 
                return view('auth.register', compact('pedido'));
            }
        }
    }

    public function pendentes() {
        // verifico se tem cadastro de cliente
        $cliente = Cliente::consultarPorUsuario(auth()->user()->id);
        if (isset($cliente)) {
            // pesquisa os  itens no carrinho
            $itens = PedidoItem::listarItensPorCliente($cliente['id']);
            
            // verifica se veio alguma coisa
            if(sizeof($itens) == 0){
                // se não tiver vendas pendentes , direciona para a home
                return redirect()->route('home');
            }

            // retorna pra view
            return view('venda.pendentes', compact('itens'));
        }
    }

    public function pagamentoMercadoPago(Request $request) {
        // pega os dados
        $dados = $request->except('_token');
        //retorna as informacaos
        return view('pagamentos.mercado_pago')->with('dados', $dados);
    }

}
