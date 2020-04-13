@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h2 class="display-6">Produto</h2>
        </div>
    </div>
    <hr>
    <form>
        <div class="form-row">

            <div class="col-3">
                <label for="nome">NOME:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="col-3">
                <label for="id_parceiro">PARCEIRO:</label>
                <select name="id_parceiro" id="id_parceiro" class="form-control">
                    <option value="">Fisica</option>
                    <option value="">Juridica</option>
                </select>
            </div>
            <div class="col-auto">
                <label for="cep">QUANTIDADE:</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
            </div>

            <div class="col-3">
                <label for="preco">PREÇO:</label>
                <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço">
            </div>
            <div class="col-3">
                <label for="descricao">DESCRIÇÃO:</label>
                <textarea class="form-control" id="descricao" id="descricao" rows="2"></textarea>
            </div>

            <div class="col-auto">
                <label for="imagem" class="pb-3">IMAGEM:</label>
                <input type="file" id="imagem" name="imagem" class="form-control-file">
            </div>

        </div>
        

        <button class="btn btn-success btn-block mt-3">Cadastrar</button>
    </form>

</div>


@endsection