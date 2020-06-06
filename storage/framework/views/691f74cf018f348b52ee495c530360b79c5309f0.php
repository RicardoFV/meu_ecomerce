<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Gestão de Estoque</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
         <!-- arquivo CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo asset('css/estilo.css') ?>">
        <!-- trabalha com icone -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
       
    </head>
    <body>

        <!-- inclusão do menu -->
        <?php echo $__env->make('menu.menu_principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <section class="jumbotron text-center">
            <div class="container">
                <h2 class="jumbotron-heading">Loja Virtual - RN Tecnologia</h2>
                <p class="lead text-muted mb-0">Carrinho de Compras</p>
            </div>
        </section>
        <!-- conteudo principal -->
        <?php echo $__env->yieldContent('conteudo'); ?>

        <!-- inclusão do rodapé -->
        <?php echo $__env->make('footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_estoque\resources\views/layout.blade.php ENDPATH**/ ?>