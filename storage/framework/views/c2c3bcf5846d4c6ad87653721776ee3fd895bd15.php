<?php $__env->startSection('conteudo'); ?>
<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-2">
                <div class="card-body text-center">
                    <a href="" data-toggle="modal" data-target="#productModal">
                        <img class="img-fluid" src="<?php echo e(url("storage/{$produto->imagem}")); ?>" />
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-5">
                <div class="card-body">

                    <form method="post" action="<?php echo e(route('carrinho.cadastrar')); ?>">
                         <?php echo csrf_field(); ?>
                        <input type="hidden" name="valor_produto" id="valor_produto" value="<?php echo e($produto->preco); ?>">
                        <input type="hidden" name="qtde_maxima" id="qtde_maxima" value="<?php echo e($produto->quantidade); ?>">
                        <input type="hidden" name="produto_id" id="produto_id" value="<?php echo e($produto->id); ?>">
                        <div class="form-group">
                            <label>Disponível : <?php echo e($produto->quantidade); ?></label><br>
                            <label>Quantidade :</label>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" onclick="diminuir()" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" readonly="readonly" class="form-control" id="quantidade" name="quantidade" min="1" max="100" value="1">
                                <div class="input-group-append">
                                    <button type="button" onclick="aumentar()" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>


                            <div class="d-flex mb-1 justify-content-end">

                                <div class=" mr-5 mb-1 d-flex">

                                    <label class="mt-2 pr-2">Unitario: </label>
                                    <input class="form-control mr-2 col-10" value="R$ <?php echo e($produto->preco); ?>" type="text" readonly="readonly">
                              
                                </div>

                                <label class="mr-1 mt-2">Total:</label>
                                <input class="form-control col-5" value="R$ <?php echo e($produto->preco); ?>" type="text" id="valor" readonly="readonly" name="valor">
                            </div>

                        </div>
                        <button class="btn btn-success btn-lg btn-block text-uppercase">
                            <i class="fa fa-shopping-cart"></i> Adicionar ao Carrinho
                        </button>
                    </form>
                    <!--
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Fast delivery</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Secure payment</li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+33 1 22 54 65 60</li>
                        </ul>
                    </div>
                    
                    <div class="reviews_product p-3 mb-2 ">
                        3 reviews
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (4/5)
                        <a class="pull-right" href="#reviews">View all reviews</a>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-5">
                <div class="card-header bg-secondary text-white text-uppercase"><i class="fa fa-align-justify"></i> Descrição</div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo e($produto->descricao); ?>

                    </p>

                </div>
            </div>
        </div>
        
        <!-- Reviews 
        <div class="col-12" id="reviews">
            <div class="card border-light mb-3">
                <div class="card-header bg-secondary text-white text-uppercase"><i class="fa fa-comment"></i> Reviews</div>
                <div class="card-body">
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016">January 01, 2018

                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        by Paul Smith
                        <p class="blockquote">
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        </p>
                        <hr>
                    </div>
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016">January 01, 2018

                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        by Paul Smith
                        <p class="blockquote">
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        </p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/venda/informacao_produto.blade.php ENDPATH**/ ?>