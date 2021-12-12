<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        app(Gate::class)->before(function(Authorizable $auth,$route){
            if(method_exists($auth,'has_permisstion')){
                return $auth->has_permisstion($route)? $auth->has_permisstion($route):false;
            }
            return false;
        });
            
    }
}
