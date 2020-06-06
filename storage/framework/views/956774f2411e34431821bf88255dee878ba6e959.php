<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- mensagem de Sucesso-->
    <?php echo $__env->make('mensagens.sucesso', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- mensagem de erro-->
    <?php echo $__env->make('mensagens.erro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Categorias</div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Nome</th> 
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($categoria->nome); ?></td>

                                <td>
                                    <a href="<?php echo e(action('CategoriaController@show',$categoria->id )); ?>" class="btn btn-info btn-sm mr-2">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" 
                                       onclick="deletar('<?php echo e(action("CategoriaController@destroy", $categoria->id)); ?>', 'Categoria');">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/lista/categoria_lista.blade.php ENDPATH**/ ?>