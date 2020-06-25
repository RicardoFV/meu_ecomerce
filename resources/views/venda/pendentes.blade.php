@extends('layouts.layout')

@section('conteudo')

<div class="container">
    <div class="col-sm-2 col-md-3 ml-4 mb-5">
        <a href="{{ route('home')}}" class="btn btn-lg btn-block btn-primary text-uppercase">voltar a comprar</a>
    </div>
    <h2 class="pt-0 text-center">Minhas Pendencias</h2>
    

        <div class="col-sm-12 mb-5">

            <table class="table table-sm table-bordered table-hover">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th scope="col" colspan="6" class=""> Cliente : {{$itens[0]->nomeCliente}} </th>
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
                    @if(isset($itens))
                    @foreach($itens as $item)
                    
                    <tr class="text-center">
                        <td scope="row"><img src="{{ url("storage/{$item->imagem}")}}" width="50" height="50"></td>
                        <td scope="row"> {{$item->produtoNome }}</td>
                        <td scope="row">{{ $item->quantidade }}</td>
                        <td scope="row">R$ {{ $item->valor }}</td>
                        <td scope="row"> 
                            <form action="{{ route('carrinho.deleta_pendente') }}" method="post">
                                 @Csrf
                                 <input type="hidden" name="pedido_id" id="pedido_id" value="{{ $item->pedido_id }}"/>
                                 <input type="hidden" name="produto_id" id="produto_id" value="{{ $item->produto_id }}"/>
                                <input type="hidden" name="quantidade_escolhidade" id="quantidade_escolhidade" value="{{ $item->quantidade }}"/>
                                <button class="btn btn-sm btn-danger mt-2">Remover</button> 
                            </form>
                                                 
                        </td>
                    </tr>
                     @endforeach
                     @endif
                     <tr>
                         <td colspan="6">
                             <a href="{{ route('carrinho.finalizar')}}" class="btn btn-success btn-block col-sm-12 mt-2 mb-2">Ir para Finalizar Compra</a>
                         </td>
                     </tr> 
                </tbody>
            </table>
            
        </div>
  
</div>

@endsection