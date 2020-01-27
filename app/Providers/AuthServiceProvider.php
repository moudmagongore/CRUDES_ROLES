<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //seulement admin et auteur peut voir la pages users
        /*Gate::define('voir-pages', function ($user) {
            return $user->hasAnyRole(['admin', 'auteur']);
        });*/

        //seulement admin et auteur peut editer les users
        Gate::define('edit-users', function ($user) {
            return $user->hasAnyRole(['admin', 'auteur']);
        });

        //seulement admin et auteur peut suspendre les users
        Gate::define('suspendre-users', function ($user) {
            return $user->hasAnyRole(['admin', 'auteur']);
        });

        //seulement admin peut supprimer les users
        Gate::define('delete-users', function ($user) {
            return $user->isAdmin();
        });
    }
}
