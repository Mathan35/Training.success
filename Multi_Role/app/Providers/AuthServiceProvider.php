<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\helpers\General;

class AuthServiceProvider extends ServiceProvider
{
    use General;
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        Organization::class => OrganizationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

     
        Gate::define('create-internal-user', function () {
            return $this->getPermissions($permission = "create-internal-user");
        });

        Gate::define('edit-internal-user', function () {
            return $this->getPermissions($permission = "edit-internal-user");
        });

        Gate::define('edit-user', function () {
            return $this->getPermissions($permission = "edit-user");
        });

       
        Gate::define('check-Admin', function () {
            return $this->checkAdmin($checkAdmin = "internal");
        });

        Gate::define('view-users', function () {
            return $this->getPermissions($permission = "view-users");
        });

        Gate::define('create-user', function () {
            return $this->getPermissions($permission = "create-user");
        });

        Gate::define('view-internal-users', function () {
            return $this->getPermissions($permission = "view-internal-users");
        });

    }
}
