@extends('layouts.app')

@section('content')
<!-- função criada para fazer deleção -->
<script type="text/javascript">

    // função responsavel por deletar 
    function deletar(url){
    if (window.confirm('Deseja realmente remover este parceiro ?')){
    window.location = url
    }
    }

</script>

<div class="container">
    <div class="jumbotron jumbotron-fluid text-center">
        <h2 class="display-6">Meus Parceiros</h2>
    </div>

    <!-- mensagem de sucesso-->
    @if(session('mensagem'))
    <div class="alert alert-success">
        <p>{{session('mensagem')}}</p>
    </div>
    @endif

    <!-- mensagem de erro-->
    @elseif(session('erro'))
    <div class="alert alert-danger">
        <p>{{session('erro')}}</p>
    </div>
    @endif

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
                    <a href="{{action('ParceiroController@consultar',$parceiro->id )}}" class="btn btn-info btn-sm mr-2">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="deletar('{{ action("ParceiroController@deletar", $parceiro->id) }}');">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>



@endsection