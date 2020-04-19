<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
</script>

<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h2 class="display-6">Atualizar Produto</h2>
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
    <form enctype="multipart/form-data" method="post" action="{{ action('ProdutoController@atualizar', $produto->id)}}">
        @Csrf
        <div class="form-row">
            
             <!-- campo responsavel por dizer que o cadastro esta ativo ou não -->
            <input type="hidden" id="ativo" name="ativo" value="{{$produto->ativo }}">

            <div class="col-3">
                <label for="nome">NOME:</label>
                <input type="text" class="form-control" value="{{$produto->nome }}" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="col-3">
                <label for="parceiro_id">PARCEIRO:</label>

                <select name="parceiro_id" id="parceiro_id" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($parceiros as $parceiro)
                    <option value="{{$parceiro->id }}" <?= ($produto->parceiro_id == $parceiro->id) ? 'selected' : '' ?> >{{$parceiro->nome }}</option>
                    @endforeach
                </select>

            </div>
            <div class="col-auto">
                <label for="cep">QUANTIDADE:</label>
                <input type="text" class="form-control" value="{{$produto->quantidade }}" id="quantidade" name="quantidade" placeholder="Quantidade">
            </div>

            <div class="col-3">
                <label for="preco">PREÇO:</label>
                <input type="text" class="form-control" id="preco" value="{{$produto->preco }}" name="preco" placeholder="Preço">
            </div>
            <div class="col-3">
                <label for="descricao">DESCRIÇÃO:</label>
                <textarea name="descricao"  id="descricao" wrap="hard" class="form-control" cols="25" rows="3" placeholder="Digite a descrição do Produto">
                    {{$produto->descricao }}
                </textarea>

            </div>

            <div class="col-auto">
                <label for="imagem"  class="">IMAGEM:</label>
                <input type="file" id="imagem"  name="imagem" class="form-control-file">
                <!-- atributo colocado para que não perca a referencia -->
                <input type="hidden" name="sem_imagem" value="{{$produto->imagem }}">
            </div>

        </div>


        <button class="btn btn-success btn-block mt-3">Atualizar</button>
    </form>

</div>
@endsection

<script type="text/javascript">
    $(document).ready(function () {
       
        // recebe o textarea
        var campo = $('#descricao')
        // passa as informaçoes digitadas
        var digitado = campo.val().trim()
        //devolve as informações sem espaço
        $('#descricao').val(digitado)

    })
</script>   