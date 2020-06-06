<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- colocando a mensagem de erro -->
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Alterar Categoria</div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(action('CategoriaController@update', $categoria->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <!-- campo responsavel por dizer que o cadastro esta ativo ou não -->
                            <input type="hidden" id="ativo" name="ativo" value="<?php echo e($categoria->ativo); ?>">
                            <!-- pega o usuario logado -->
                            <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo e(Auth::user()->id); ?>"> 
                            <div class="col-3">
                                <label for="nome">NOME:</label>
                                <input type="text" class="form-control" id="nome" value="<?php echo e($categoria->nome); ?>" name="nome" placeholder="Nome">
                            </div>
                            
                        </div>
                        <button class="btn btn-success btn-block mt-3">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/altera/categoria_altera.blade.php ENDPATH**/ ?>