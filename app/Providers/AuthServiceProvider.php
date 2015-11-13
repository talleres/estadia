<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        $gate->define('canCreate', function($user, $modulo){
            return $user->AllowToCreate($modulo);
        });

        $gate->define('canRead', function($user, $modulo){
            return $user->AllowToRead($modulo);
        });

        $gate->define('canUpdate', function($user, $modulo){
            return $user->AllowToUpdate($modulo);
        });

        $gate->define('canDelete', function($user, $modulo){
            return $user->AllowToDelete($modulo);
        });

        $gate->define('canSearch', function($user, $modulo){
            return $user->AllowToSearch($modulo);
        });

        $gate->define('canExcel', function($user, $modulo){
            return $user->AllowExcel($modulo);
        });

        $gate->define('canPDF', function($user, $modulo){
            return $user->AllowPDF($modulo);
        });

        $gate->define('canEmail', function($user, $modulo){
            return $user->AllowEmail($modulo);
        });        
    }
}
