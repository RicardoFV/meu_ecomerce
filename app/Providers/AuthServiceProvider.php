<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate;
use App\User;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate) {
        $this->registerPolicies($gate);
        $gate->define('adm',function (User $user) {
            return $user->permissao == 'administrador';
        });

        $gate->define('vendedor', function (User $user) {
            return $user->permissao == 'vendedor';
        });

       $gate->define('cliente', function (User $user) {
            return $user->permissao == "cliente";
        });
        
        $gate->allows('adm');
        
    }

}
