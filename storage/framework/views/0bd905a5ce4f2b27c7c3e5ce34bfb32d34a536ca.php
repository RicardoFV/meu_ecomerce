

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- mensagem de Sucesso-->
    <?php echo $__env->make('mensagens.sucesso', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- mensagem de erro-->
    <?php echo $__env->make('mensagens.erro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Parceiros</div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $parceiros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parceiro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($parceiro->nome); ?></td>
                                <td><?php echo e($parceiro->email); ?></td>
                                <td><?php echo e($parceiro->tipo); ?></td>
                                <td><?php echo e($parceiro->telefone); ?></td>
                                <td><?php echo e($parceiro->celular); ?></td>
                                <td>
                                    <a href="<?php echo e(action('ParceiroController@consultar',$parceiro->id )); ?>" class="btn btn-info btn-sm mr-2">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" 
                                       onclick="deletar('<?php echo e(action("ParceiroController@deletar", $parceiro->id)); ?>', 'Parceiro');">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/lista/parceiro_lista.blade.php ENDPATH**/ ?>