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
            <h1 class="display-4">Parceiro</h1>
        </div>
    </div>

    <form action="">
        <div class="form-row">
            <div class="col-sn-3">
                <label for="meu_cep">Digite o cep:</label>
                <input type="text" class="form-control" name="meu_cep" id="meu_cep" placeholder="Digite o cep">     
            </div>   
        </div>
    </form>

    <hr>

    <form>
        <div class="form-row">

            <div class="col-3">
                <label for="nome">NOME:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="col-3">
                <label for="email">E-MAIL:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
            </div>
            <div class="col-3">
                <label for="tipo">TIPO:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="">Fisica</option>
                    <option value="">Juridica</option>
                </select>
            </div>

            <div class="col-3">
                <label for="tipo_documento">CPF/CNPJ:</label>
                <input type="text" class="form-control" id="tipo_documento" name="tipo_documento" placeholder="CPF/CNPJ">
            </div>

            <div class="col-auto">
                <label for="cep">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep">
            </div>

            <div class="col-auto">
                <label for="logradouro">LOGRADOURO:</label>
                <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="logradouro">
            </div>
            <div class="col-auto">
                <label for="complemento">COMPLEMENTO:</label>
                <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Complemento">
            </div>

            <div class="col-auto">
                <label for="bairro">BAIROO:</label>
                <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro">
            </div>
            <div class="col-auto">
                <label for="localidade">LOCALIDADE:</label>
                <input type="text" id="localidade" name="localidade" class="form-control" placeholder="Localidade">
            </div>

            <div class="col-auto">
                <label for="uf">UF:</label>
                <input type="text" id="uf" name="uf" class="form-control" placeholder="Uf">
            </div>
            <div class="col-auto">
                <label for="telefone">TELEFONE:</label>
                <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone">
            </div>
            <div class="col-auto">
                <label for="celular">CELULAR:</label>
                <input type="text" id="celular" name="celular" class="form-control" placeholder="Celular">
            </div>
        </div>
        <hr>
    
        <button class="btn btn-success btn-block mt-3">Cadastrar</button>
    </form>

</div>
@endsection


<script>
    // inicio do codigo jquery
    $(document).ready(function(){
       
        $('body').on('blur','#meu_cep', function(){
            let meu_cep = $('#meu_cep').val()

            

            $.ajax({
                type:'get',
                url:'https://viacep.com.br/ws/'+meu_cep+'/json/',
                dataType:'json', 
                success:function(resposta){
                    console.log(resposta)
                },
                error:function(erro){
                    console.log(erro)
                }
            })
           
        })


    })


</script>
