<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Respect\Validation\Rules as RespectRules;

class ValidacoesService extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        /* se quiser validar somente o cpf
          // validaçao de cpf
          Validator::extend('cpf', function($attribute, $value, $parameters, $validator) {
          return (new RespectRules\Cpf())->validate($value);
          });
         * 
         */
        // validaçao de cpf e cnpj e cep
        Validator::extend('document', function($attribute, $value, $parameters, $validator) {
            return (new RespectRules\OneOf(
                            new RespectRules\Cnpj(),
                            new RespectRules\Cpf(),
                            new RespectRules\PostalCode('BR')
                    ))->validate($value);
        });
    }

}
