<?php $__env->startSection('conteudo'); ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Marcas</div>
                <ul class="list-group category_block">
                    
                        <li class="list-group-item"><a href=""></a></li>
                    
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Último Produto</div>
                <div class="card-body">
                    <img class="img-fluid" src="" />
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>
                    <p class="bloc_left_price"></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
           <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo e(url("storage/$produto->imagem")); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="" title="ver Produto">
                                <?php echo e($produto->nome); ?>

                                </a>
                            </h4>
                            <p class="card-text">
                                
                            </p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">R$
                                        <?php echo e($produto->preco); ?>

                                    </p>
                                </div>
                                <div class="col">
                                    <a href="informacao/produto/<?php echo e($produto->id); ?>" class="btn btn-success btn-block">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_estoque\resources\views/home.blade.php ENDPATH**/ ?>