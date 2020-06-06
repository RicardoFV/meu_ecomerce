<div class="container">
    <!-- mensagem de sucesso-->
    <?php if(session('mensagem')): ?>
    <div class="alert alert-success">
        <p><?php echo e(session('mensagem')); ?></p>
    </div>
    <?php endif; ?>
</div>

<?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/mensagens/sucesso.blade.php ENDPATH**/ ?>