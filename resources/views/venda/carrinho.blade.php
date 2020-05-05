@extends('layouts.layout')

@section('conteudo')

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produto</th>
                            <th scope="col">Em estoque</th>
                            <th scope="col" class="text-center">Quantidade</th>
                            <th scope="col" class="text-right">Preço</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carrinhoItens as $carrinho)

                        <tr>
                            <td><img src="{{ url("storage/{$carrinho->imagem}") }}" width="70" height="70" /> </td>
                            <td>{{ $carrinho->produtoNome }} </td>
                            <td>{{ $carrinho->produtoQuantidade }}</td>
                            <form action="{{ route('carrinho.atualizar') }}" method="post">
                                @Csrf
                                <input type="hidden" name="produto_id" id="produto_id" value="{{ $carrinho->produto_id }}"/>
                                <input type="hidden" name="item_pedido" id="item_pedido" value="{{ $carrinho->id }}"/>
                                <td><input class="form-control text-center" value="{{$carrinho->quantidade}}" type="text" id="quantidade" name="quantidade" /></td>
                            </form>
                                <td class="text-right">R$ {{$carrinho->valor }}</td>
                            <form action="{{ route('carrinho.deletar') }}" method="post">
                                 @Csrf
                                 <input type="hidden" name="produto_id" id="produto_id" value="{{ $carrinho->produto_id }}"/>
                                <input type="hidden" name="pedido_item" id="pedido_item" value="{{ $carrinho->id }}"/>
                                <input type="hidden" name="quantidade_escolhidade" id="quantidade_escolhidade" value="{{ $carrinho->quantidade }}"/>
                                <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                            </form> 
                        </tr>
                    @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Sub-Total</td>
                        <td class="text-right">255,90 €</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Shipping</td>
                        <td class="text-right">6,90 €</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td class="text-right"><strong>346,90 €</strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="{{ route('home')}}" class="btn btn-lg btn-block btn-primary text-uppercase">voltar a comprar</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Finalizar Compra</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection