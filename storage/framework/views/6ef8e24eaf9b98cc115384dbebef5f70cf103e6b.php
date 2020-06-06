



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
                <div class="card-header">Alterar Parceiro</div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(action('ParceiroController@atualizar', $parceiro->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <!-- campo responsavel por dizer que o cadastro esta ativo ou não -->
                            <input type="hidden" id="ativo" name="ativo" value="<?php echo e($parceiro->ativo); ?>">
                            <!-- pega o usuario logado -->
                            <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo e(Auth::user()->id); ?>"> 
                            <div class="col-3">
                                <label for="nome">NOME:</label>
                                <input type="text" class="form-control" id="nome" value="<?php echo e($parceiro->nome); ?>" name="nome" placeholder="Nome">
                            </div>
                            <div class="col-3">
                                <label for="email">E-MAIL:</label>
                                <input type="email" class="form-control" id="email" value="<?php echo e($parceiro->email); ?>" name="email" placeholder="E-mail">
                            </div>
                            <div class="col-3">
                                <label for="tipo">TIPO:</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="fisica" <?= ($parceiro->tipo == 'fisica') ? 'selected' : '' ?> >Fisica</option>
                                    <option value="juridica" <?= ($parceiro->tipo == 'juridica') ? 'selected' : '' ?> >Juridica</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="tipo_documento">CPF/CNPJ:</label>
                                <input type="text" class="form-control" value="<?php echo e($parceiro->tipo_documento); ?>" id="tipo_documento" name="tipo_documento" placeholder="CPF/CNPJ">
                            </div>

                            <div class="col-auto">
                                <label for="cep">CEP:</label>
                                <input type="text" class="form-control" value="<?php echo e($parceiro->cep); ?>" id="cep" name="cep" placeholder="Cep">
                            </div>

                            <div class="col-auto">
                                <label for="logradouro">LOGRADOURO:</label>
                                <input type="text" id="logradouro" value="<?php echo e($parceiro->logradouro); ?>" name="logradouro" class="form-control" placeholder="logradouro">
                            </div>
                            <div class="col-auto">
                                <label for="complemento">COMPLEMENTO:</label>
                                <input type="text" id="complemento" name="complemento" value="<?php echo e($parceiro->complemento); ?>" class="form-control" placeholder="Complemento">
                            </div>

                            <div class="col-auto">
                                <label for="bairro">BAIROO:</label>
                                <input type="text" id="bairro" name="bairro" value="<?php echo e($parceiro->bairro); ?>" class="form-control" placeholder="Bairro">
                            </div>
                            <div class="col-auto">
                                <label for="localidade">LOCALIDADE:</label>
                                <input type="text" id="localidade" name="localidade" value="<?php echo e($parceiro->localidade); ?>" class="form-control" placeholder="Localidade">
                            </div>

                            <div class="col-auto">
                                <label for="uf">UF:</label>
                                <input type="text" id="uf" name="uf" value="<?php echo e($parceiro->uf); ?>" class="form-control" placeholder="Uf">
                            </div>
                            <div class="col-auto">
                                <label for="telefone">TELEFONE:</label>
                                <input type="text" id="telefone" name="telefone" value="<?php echo e($parceiro->telefone); ?>" class="form-control" placeholder="Telefone">
                            </div>
                            <div class="col-auto">
                                <label for="celular">CELULAR:</label>
                                <input type="text" id="celular" name="celular" value="<?php echo e($parceiro->celular); ?>" class="form-control" placeholder="Celular">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_estoque\resources\views/altera/parceiro_altera.blade.php ENDPATH**/ ?>