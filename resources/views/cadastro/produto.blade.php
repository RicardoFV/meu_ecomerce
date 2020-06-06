@extends('layouts.app')

@section('content')

<div class="container">

     <!-- colocando a mensagem de erro -->
    @include('mensagens.erro_cadastro')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastro de Produto</div>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{ route('produto.cadastrar') }}">
                        @Csrf
                        <div class="form-row">
                            <!-- campo responsavel por dizer que o cadastro esta ativo ou não -->
                            <input type="hidden" id="ativo" name="ativo" value="1">
                            <!-- pega o usuario logado -->
                            <input type="hidden" id="usuario_id" name="usuario_id" value="{{Auth::user()->id }}"> 
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
                                <textarea name="descricao"  id="descricao" wrap="hard"  class="form-control" cols="25" rows="3" placeholder="Digite a descrição do Produto">
                    {{old('descricao')}}
                                </textarea>

                            </div>
                             <div class="col-3">
                                <label for="parceiro_id">CATEGORIA:</label>

                               <select name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="">Selecione</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nome }}</option>
                                    @endforeach
                               </select> 
                            </div>

                            <div class="col-auto">
                                <label for="imagens" class="">IMAGEM:</label>
                                <input type="file" id="imagem" name="imagem" class="form-control-file">
                            </div>

                        </div>


                        <button class="btn btn-success btn-block mt-3">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
