@extends('layouts.app')

@section('content')

<div class="container">
    <!-- mensagem de Sucesso-->
    @include('mensagens.sucesso')

    <!-- mensagem de erro-->
    @include('mensagens.erro')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Produtos</div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Imagem</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Descricao</th>
                                <th scope="col">Valor Unitario</th>
                                <th scope="col">Parceiro</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($produtos as $produto)
                            <tr>
                                <td>
                                    <img src="{{ url("storage/{$produto->imagem}") }}" width="50" height="50" />
                                </td>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->preco}}</td>
                                <td>{{$produto->nomeProduto }}</td>
                                <td>{{$produto->nomeCategoria }}</td>
                                <td>{{$produto->quantidade}}</td>
                                <td>
                                    <a href="{{action('ProdutoController@consultar', $produto->id)}}" class="btn-info btn-sm mr-2">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a href="" class="btn-danger btn-sm" 
                                       onclick="deletar('{{ action("ProdutoController@deletar", $produto->id) }}', 'Produto');">
                                        <i class="fas fa-trash-alt mt-3"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>



@endsection