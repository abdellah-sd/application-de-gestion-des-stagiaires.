<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('access-admin', function(User $user){
            return $user->type_user == 1;
        });

        Gate::define('access-responsable', function(User $user){
            return $user->type_user == 2;
        });

        Gate::define('access-employe', function(User $user){
            return $user->type_user == 3;
        });
    }
}
