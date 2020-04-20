<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            // pega o id da sesssao do navegador
            $table->text('session_id');
            $table->integer('parceiro_id')->unsigned();
            // vinculo de usuario com a venda
            $table->integer('usuario_id')->unsigned();
            $table->foreign('parceiro_id')->references('id')->on('parceiros');
            $table->foreign('usuario_id')->references('id')->on('users');
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
        Schema::dropIfExists('vendas');
    }
}
