<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parceiros', function (Blueprint $table) {
            $table->increments('id');
            // aqui sera o nome ou a razão social
            $table->string('nome');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('localidade');
            $table->string('uf');
            $table->string('email');
            $table->string('telefone');
            $table->string('celular');
            // tipo de parceiro (1 - para fisica 2 para juridica)
            $table->string('tipo');
            // nesse tipo documento sera armazenado (CPF ou CNPJ)
            $table->string('tipo_documento');
            //esse campo e responsavel por dizer que esta ativo ou não (1 ativo 0 inivativo)
            $table->integer('ativo');
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
        Schema::dropIfExists('parceiros');
    }
}
