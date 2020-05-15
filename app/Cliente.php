<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    //campos que seram cadastrados
    protected $fillable = [
        'nome',
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'localidade',
        'uf',
        'email',
        'telefone',
        'celular',
        'data_nascimento',
        'cpf',
        'ativo',
        'usuario_id'
    ];
    
    //consultar por usuario 
    public static function consultarPorUsuario($usuario_id) {
        return self::where('usuario_id',$usuario_id)->first();
    }
   

}
