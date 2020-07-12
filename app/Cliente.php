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
        return self::where('usuario_id', $usuario_id)->first();
    }

    // metodo que consulta o cpf do cliente
    public static function consultarCpf($cpf) {
        return self::where(['cpf' => $cpf, 'usuario_id' => auth()->user()->id])->first();
    }
}
