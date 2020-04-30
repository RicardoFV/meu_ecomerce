<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //campos que serão inseridos
    protected $fillable = [
        'ativo',
        'nome', 
        'descricao',
        'preco',
        'quantidade',
        'parceiro_id',
        'imagem',
        'usuario_id'   
    ];
}
