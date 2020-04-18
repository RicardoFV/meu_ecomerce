@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h2 class="display-6">Novo Produto</h2>
        </div>
    </div>
    <!-- colocando a mensagem de erro -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <hr>
    <form enctype="multipart/form-data" method="post" action="{{ route('produto.cadastrar') }}">
        @Csrf
        <div class="form-row">

            <div class="col-3">
                <label for="nome">NOME:</label>
                <input type="text" class="form-control" id="nome" value="{{old('nome')}}" name="nome" placeholder="Nome">
            </div>
            <div class="col-3">
                <label for="parceiro_id">PARCEIRO:</label>

                <select name="parceiro_id" id="parceiro_id" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($parceiros as $parceiro)
                    <option value="{{$parceiro->id}}">{{$parceiro->nome }}</option>
                    @endforeach
                </select> 

            </div>
            <div class="col-auto">
                <label for="cep">QUANTIDADE:</label>
                <input type="text" class="form-control" value="{{old('quantidade')}}" id="quantidade" name="quantidade" placeholder="Quantidade">
            </div>

            <div class="col-3">
                <label for="preco">PREÇO:</label>
                <input type="text" class="form-control" id="preco" value="{{old('preco')}}" name="preco" placeholder="Preço">
            </div>
            <div class="col-3">
                <label for="descricao">DESCRIÇÃO:</label>
                <textarea name="descricao" id="descricao" wrap="hard"  class="form-control" cols="25" rows="3" placeholder="Digite a descrição do Produto">
                    {{old('descricao')}}
                </textarea>
        
            </div>

            <div class="col-auto">
                <label for="imagens" class="">IMAGEM:</label>
                
                <input type="file" id="imagem" name="imagem" class="form-control-file">
            </div>

        </div>


        <button class="btn btn-success btn-block mt-3">Cadastrar</button>
    </form>

</div>


@endsection