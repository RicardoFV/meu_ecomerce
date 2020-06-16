@extends('layouts.layout')

@section('conteudo')

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
                  
                    <tr class="text-center">
                        <td scope="row"></td>
                        <td scope="row"> </td>
                        <td scope="row"></td>
                        <td scope="row"></td>
                        <td scope="row"> 
                            <form action="" method="post">
                                 @Csrf
                                 
                                <button class="btn btn-sm btn-danger mt-2">Remover</button> 
                            </form>
                                                 
                        </td>
                    </tr>
                     
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