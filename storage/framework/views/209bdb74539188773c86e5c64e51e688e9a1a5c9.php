<!-- mensagem de erro-->
<div class="container">
    <?php if(session('erro')): ?>
    <div class="alert alert-danger">
        <p><?php echo e(session('erro')); ?></p>
    </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Projetos\laravel\meu_estoque\resources\views/mensagens/erro.blade.php ENDPATH**/ ?>