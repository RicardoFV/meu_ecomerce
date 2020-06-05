<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status_pagamento', ['pendente', 'aprovado', 'cancelado']);
            $table->enum('forma_pagamento', ['boleto', 'cartao']);
            $table->decimal('valor_pago', 10, 2)->default(0);
            $table->string('data_vencimento');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
}
