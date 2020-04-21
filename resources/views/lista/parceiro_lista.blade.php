@extends('layouts.app')

@section('content')
<div class="container">

    <!-- mensagem de sucesso-->
    @if(session('mensagem'))
    <div class="alert alert-success">
        <p>{{session('mensagem')}}</p>
    </div>

    <!-- mensagem de erro-->
    @elseif(session('erro'))
    <div class="alert alert-danger">
        <p>{{session('erro')}}</p>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Parceiros</div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parceiros as $parceiro)
                            <tr>
                                <td>{{$parceiro->nome}}</td>
                                <td>{{$parceiro->email}}</td>
                                <td>{{$parceiro->tipo}}</td>
                                <td>{{$parceiro->telefone}}</td>
                                <td>{{$parceiro->celular}}</td>
                                <td>
                                    <a href="{{action('ParceiroController@consultar',$parceiro->id )}}" class="btn btn-info btn-sm mr-2">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" 
                                       onclick="deletar('{{ action("ParceiroController@deletar", $parceiro->id) }}', 'Parceiro');">
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