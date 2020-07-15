<?php $__env->startSection('conteudo'); ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-secondary text-white text-uppercase"><i class="fa fa-list"></i> Categorias</div>
                <ul class="list-group category_block">
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <a href="<?php echo e(route('produto.categoria',$categoria->id)); ?>"><?php echo e($categoria->nome); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 mb-5">

                    <div class="text-center mr-2">
                        <img class="card-img-top" src="<?php echo e(url("storage/$produto->imagem")); ?>" width="50px" height="178">
                        <h5 class="mt-3"> R$ <?php echo e(number_format($produto->preco,2, ',','.')); ?></h5>
                        <h3 class="mt-0"><?php echo e($produto->nome); ?></h3>
                        
                        <div class="col mt-1">
                            <a href="<?php echo e(route('informacao.venda',$produto->id )); ?>" class="btn btn-secondary btn-block">Comprar</a>
                        </div> 
                    </div>
              
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/home.blade.php ENDPATH**/ ?>