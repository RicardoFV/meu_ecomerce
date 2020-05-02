<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    //colocando o nome da tabela
    protected $table ='pedido_itens';
    
    // os campos da tabela 
    protected $fillable = [
        'quantidade',
        'valor',
        'pedido_id',
        'produto_id'
    ];
}
