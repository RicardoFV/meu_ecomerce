@extends('layouts.layout')

@section('conteudo')

<div>
    <div class="col-sm-2 col-md-3 ml-4">
        <a href="{{ route('home')}}" class="btn btn-lg btn-block btn-primary text-uppercase">voltar a comprar</a>
    </div>
    <h2 class="ml-5 mb-1 text-center">Meu Carrinho</h2>
    <hr>
    <div class="row">

        <div class="col-sm-7">
            {{ $frete }}
            @php
            $total =0;
            $idCliente =0;
            $nomeCliente = '';
            $emailCliente = '';
            @endphp
            
          
            <table class="table table-sm table-bordered table-hover ml-4 mb-5">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th scope="col" colspan="6" class=""> Cliente : {{$itens[0]->nomeCliente}} </th>

                        @php 
                        // pega o cliente 
                        $idCliente = $itens[0]->idCliente;
                        $nomeCliente = $itens[0]->nomeCliente;
                        $emailCliente = $itens[0]->emailCliente
                        @endphp
                    </tr>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome do Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
              
                    @foreach($itens as $item)
                   
                        <tr class="text-center">
                            <td scope="row"><img src="{{ url("storage/{$item->imagem}")}}" width="50" height="50"></td>
                            <td scope="row"> {{$item->produtoNome }}</td>
                            <td scope="row">{{ $item->quantidade }}</td>
                            <td scope="row">R$ {{ $item->valor }}</td>
                            <td scope="row"> 
                                <form action="{{ route('carrinho.deleta_pendente') }}" method="post" onclick="MensagemcarregarBoleto()>
                                    @Csrf
                                    <input type="hidden" name="pedido_id" id="pedido_id" value="{{ $item->pedido_id }}"/>
                                    <input type="hidden" name="produto_id" id="produto_id" value="{{ $item->produto_id }}"/>
                                    <input type="hidden" name="pedido_item" id="pedido_item" value="{{ $item->id }}"/>
                                    <input type="hidden" name="quantidade_escolhidade" id="quantidade_escolhidade" value="{{ $item->quantidade }}"/>
                                    <button class="btn btn-sm btn-danger mt-2">Remover</button> 
                                </form>  
                            </td>
                        </tr>
                 
                    @php
                    $total += $item->valor + $frete->cServico->Valor;
                    @endphp
                    @endforeach

                </tbody>
            </table>
            
        </div>

        <div class="col-sm-5">

            <div class="card w-75 ml-5">
                <div class="card-header">
                    <h5 class="card-title text-center">Finalizar Compra</h5>
                </div>
                <div class="card-body">
                    
                    <div class="form-group d-flex">
                        <label for="calcualr"> <strong>Valor Frete :</strong></label>
                        <p class="ml-2"> {{$frete->cServico->Valor}} </p>
                        
                        <label for="calcualr" class="ml-5"><strong>Previsão de Entrega :</strong></label>
                        <p class="ml-2"> {{$frete->cServico->PrazoEntrega}} </p>
                    </div>
                    
                    
                    <form method="post" action="{{ route('gerar_boleto') }}">
                        @Csrf
                        <p class="card-text"> <strong>Total :</strong> R$ {{ number_format($total,2,',','.' )}}</p>        
                        <input type="hidden" name="idcliente" id="idcliente" value="{{ $idCliente }}">
                        <input type="hidden" name="valor_frete" id="valor_frete" value="{{$frete->cServico->Valor}}"/>
                        <input type="hidden" name="prazo_entrega" id="prazo_entrega" value="{{$frete->cServico->PrazoEntrega}}"/>

                        <button onclick="MensagemcarregarBoleto()" class="btn btn-success btn-block">Gerar Boleto</button>
                    </form>                  
                </div>
            </div>  

        </div>
    </div>
</div>

@endsection