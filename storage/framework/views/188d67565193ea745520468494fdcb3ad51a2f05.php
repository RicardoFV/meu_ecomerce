<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- colocando a mensagem de erro -->
    <?php echo $__env->make('mensagens.erro_cadastro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastro de Categoria</div>
                <div class="card-body">

                    <form method="post" action="<?php echo e(route('categoria.cadastrar')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <!-- campo responsavel por dizer que o cadastro esta ativo ou não -->
                            <input type="hidden" id="ativo" name="ativo" value="1">
                            <!-- pega o usuario logado -->
                            <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo e(Auth::user()->id); ?>">
                           
                            <div class="col-sm-6">
                                <label for="nome">NOME:</label>
                                <input type="text" class="form-control" id="nome" value="<?php echo e(old('nome')); ?>" name="nome" placeholder="Nome da Categoria">
                            </div>
                            
                        </div>
                        <button class="btn btn-success btn-block mt-3">Cadastrar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/cadastro/categoria.blade.php ENDPATH**/ ?>