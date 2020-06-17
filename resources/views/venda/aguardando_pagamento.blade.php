@extends('layouts.layout')

@section('conteudo')

{{ $aguardando }}


<div class="container">
    <div class="col-sm-2 col-md-3 ml-4 mb-5">
        <a href="{{ route('home')}}" class="btn btn-lg btn-block btn-primary text-uppercase">
            voltar a comprar
        </a>
    </div>
    <h2 class="pt-0 text-center">Aguardando Pagamentos</h2>
    
        <div class="col-sm-12 mb-5">

            <table class="table table-sm table-bordered table-hover">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th scope="col" colspan="6" class=""> Cliente : {{$aguardando[0]->nomeCliente}} </th>
                    </tr>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Forma Pagamento</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($aguardando as $ag)
                    <tr class="text-center">
                        <td scope="row">{{ $ag->id }}</td>
                        <td scope="row">{{ $ag->status_pagamento }} </td>
                        <td scope="row">{{ $ag->forma_pagamento }}</td>
                        <td scope="row">{{ $ag->valor_pago }}</td>
                        <td scope="row"> 
                            <form action="" method="post">
                                 @Csrf
                                 
                                <button class="btn btn-sm btn-danger mt-2">Remover</button> 
                            </form>
                                                 
                        </td>
                    </tr>
                    @endforeach 
                     <tr>
                         <td colspan="6">
                             <a href="" class="btn btn-success btn-block col-sm-12 mt-2 mb-2">
                                 Ir para Finalizar Compra
                             </a>
                         </td>
                     </tr> 
                </tbody>
            </table>
            
        </div>
  
</div>

@endsection