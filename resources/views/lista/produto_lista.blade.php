@extends('layouts.app')

@section('content')
<!-- função criada para fazer deleção -->
<script type="text/javascript">

// função responsavel por deletar 
    function deletar(url) {
    if (window.confirm('Deseja realmente remover este Produto ?')) {
    window.location = url
    }
    }

</script>

<div class="container">
    <div class="jumbotron jumbotron-fluid text-center">
        <h2 class="display-6">Meus Produtos</h2>
    </div>

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
    

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Imagem</th>
                <th scope="col">Nome</th>
                <th scope="col">Descricao</th>
                <th scope="col">Valor Unitario</th>
                <th scope="col">Parceiro</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>
                    <img src="{{ url("storage/{$produto->imagem}") }}" width="50" height="50" />
                </td>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->descricao}}</td>
                <td>{{$produto->preco}}</td>
                <td>{{$produto->nomeProduto }}</td>
                <td>{{$produto->quantidade}}</td>
                <td>
                    <a href="{{action('ProdutoController@consultar', $produto->id)}}" class="btn-info btn-sm mr-2">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <a href="" class="btn-danger btn-sm" 
                       onclick="deletar('{{ action("ProdutoController@deletar", $produto->id) }}');">
                        <i class="fas fa-trash-alt mt-3"></i>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>



@endsection