<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\helpers\General;
use App\MOdels\User;

class AuthServiceProvider extends ServiceProvider
{
    use General;

    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('create-post', function (User $user) {
            return $this->CheckPermissions($permission = 'create post');
        });
        Gate::define('edit-post', function (User $user) {
            return $this->CheckPermissions($permission = 'edit post');
        });
        Gate::define('delete-post', function (User $user) {
            return $this->CheckPermissions($permission = 'delete post');
        });
        Gate::define('update-post', function (User $user) {
            return $this->CheckPermissions($permission = 'update post');
        });
        Gate::define('destroy-post', function (User $user) {
            return $this->CheckPermissions($permission = 'destroy post');
        });

        Gate::define('check-name', function (User $user) {
                return $user->name == "Mathankumar";
        });
       
        Gate::define('check-middlware', function (User $user) {
            if($user->name == "Mathankumar"){
                return true;

            }
            else{
                abort(401);
            }
    });

      

      
    }
}
