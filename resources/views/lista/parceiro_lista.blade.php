@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid text-center">
                <h1 class="display-4">Parceiro</h1>
        </div>

        <table class="table">
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
                        <a href="">Atualizar</a>
                        <a href="">Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

   

@endsection