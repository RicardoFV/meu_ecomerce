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
                <div class="card-header">Lista de Categorias</div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Nome</th> 
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($categorias as $categoria)
                            <tr>
                                <td>{{$categoria->nome}}</td>

                                <td>
                                    <a href="{{action('CategoriaController@show',$categoria->id )}}" class="btn btn-info btn-sm mr-2">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" 
                                       onclick="deletar('{{ action("CategoriaController@destroy", $categoria->id) }}', 'Categoria');">
                                        <i class="far fa-trash-alt"></i>
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