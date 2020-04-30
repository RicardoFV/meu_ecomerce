<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model {

    //campos que serão permitidos 
    protected $fillable = [
        'nome', 'email', 'tipo_documento', 'tipo','cep', 'logradouro', 'complemento',
        'bairro','localidade','uf', 'telefone', 'celular','ativo', 'usuario_id'
    ];
   
}
