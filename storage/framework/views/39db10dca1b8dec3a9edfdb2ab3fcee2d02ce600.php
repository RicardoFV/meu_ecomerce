<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

        <title>Loja Virtual - RN Tecnologia</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
         <!-- arquivo CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo asset('css/estilofooter.css') ?>">
        <!-- trabalha com icone -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="<?php echo e(asset('js/validacoes.js')); ?>"></script>       
    </head>
    <body>

        <!-- inclusão do menu -->
        <?php echo $__env->make('esqueleto_projeto.menu_principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <br><br>
        <!-- conteudo principal -->
        <?php echo $__env->yieldContent('conteudo'); ?>

        <!-- inclusão do rodapé -->
        <?php echo $__env->make('esqueleto_projeto.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/layouts/layout.blade.php ENDPATH**/ ?>