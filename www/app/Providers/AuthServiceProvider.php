<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User,
    App\Models\Post;

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

        Gate::define('create-post', function (User $user) {

            return true;
        });

        // Gate::define('edit-post', function (User $user, Post $post) {

        //     return $post->user->is($user);
        // });

        // Gate::before(function(User $user){
        //     if ($user->isAdmin) {

        //         return true;
        //     }
        // });
         
        Gate::before(function(User $user, string $permission) {

            return $user->getPermissionsName()->contains($permission);
        });
    }
}
