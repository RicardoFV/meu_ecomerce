<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Loja Virtual - RN Tecnologia</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
         <!-- arquivo CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo asset('css/estilofooter.css') ?>">
        <!-- trabalha com icone -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="{{asset('js/validacoes.js')}}"></script>
        
    </head>
    <body>

        <!-- inclusão do menu -->
        @include('esqueleto_projeto.menu_principal')

        <section class="jumbotron text-center">
            <div class="container">
                <h2 class="jumbotron-heading">Loja Virtual - RN Tecnologia</h2>
                <p class="lead text-muted mb-0">Faça a compra do seu produto on-line</p>
            </div>
        </section>
        <!-- conteudo principal -->
        @yield('conteudo')

        <!-- inclusão do rodapé -->
        @include('esqueleto_projeto.footer')