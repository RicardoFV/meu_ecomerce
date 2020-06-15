

<?php $__env->startSection('conteudo'); ?>

<div>
    <div class="col-sm-2 col-md-3 ml-4">
        <a href="<?php echo e(route('home')); ?>" class="btn btn-lg btn-block btn-primary text-uppercase">voltar a comprar</a>
    </div>
    <h2 class="ml-5 mb-1 text-center">Meu Carrinho</h2>
    <hr>
    <div class="row">

        <div class="col-sm-7">

            <?php
            $total =0;
            $idCliente =0;
            $nomeCliente = '';
            $emailCliente = '';
            ?>
            
            <?php if($itens[0]->status == 'pendente' || !empty($itens)){ ?>
            <table class="table table-sm table-bordered table-hover ml-4 mb-5">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th scope="col" colspan="6" class=""> Cliente : <?php echo e($itens[0]->nomeCliente); ?> </th>

                        <?php 
                        // pega o cliente 
                        $idCliente = $itens[0]->idCliente;
                        $nomeCliente = $itens[0]->nomeCliente;
                        $emailCliente = $itens[0]->emailCliente
                        ?>
                    </tr>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome do Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
               

                    <?php $__currentLoopData = $itens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   
                        <tr class="text-center">
                            <td scope="row"><img src="<?php echo e(url("storage/{$item->imagem}")); ?>" width="50" height="50"></td>
                            <td scope="row"> <?php echo e($item->produtoNome); ?></td>
                            <td scope="row"><?php echo e($item->quantidade); ?></td>
                            <td scope="row">R$ <?php echo e($item->valor); ?></td>
                            <td scope="row"> 
                                <form action="<?php echo e(route('carrinho.deleta_pendente')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="pedido_id" id="pedido_id" value="<?php echo e($item->pedido_id); ?>"/>
                                    <input type="hidden" name="produto_id" id="produto_id" value="<?php echo e($item->produto_id); ?>"/>
                                    <input type="hidden" name="pedido_item" id="pedido_item" value="<?php echo e($item->id); ?>"/>
                                    <input type="hidden" name="quantidade_escolhidade" id="quantidade_escolhidade" value="<?php echo e($item->quantidade); ?>"/>
                                    <button class="btn btn-sm btn-danger mt-2">Remover</button> 
                                </form>  
                            </td>
                        </tr>
                 
                    <?php
                    $total += $item->valor;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
            <?php }else{
     echo 'não ha itens';
            } ?>
        </div>

        <div class="col-sm-5">

            <div class="card w-75 ml-5">
                <div class="card-header">
                    <h5 class="card-title text-center">Finalizar Compra</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('gerar_boleto')); ?>">
                        <?php echo csrf_field(); ?>
                        <p class="card-text"> <strong>Total :</strong> R$ <?php echo e(number_format($total,2,',','.' )); ?></p>        
                        <input type="hidden" name="idcliente" id="idcliente" value="<?php echo e($idCliente); ?>">

                        <button target="_blank" class="btn btn-success btn-block">Gerar Boleto</button>
                    </form>                  
                </div>
            </div>  

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/venda/finalizar_venda.blade.php ENDPATH**/ ?>