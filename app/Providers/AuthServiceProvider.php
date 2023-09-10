<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\permission\Permission;
use App\Models\User;
use App\Services\Auth\VenGuard;
use Illuminate\Support\Facades\Auth;

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

        Auth::extend('venguard', function ($app, $name, array $config) {
            return new VenGuard(Auth::createUserProvider($config['provider']), $this->app['request']);
        });
        
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            // dd(User::hasRole($permission->roles));
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }

        //
    }
}
