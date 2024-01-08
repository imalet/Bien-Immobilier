<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Article;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        // Gate::define('update-article', function (User $user, Article $article) {
        //     return $user->id === $article->id;
        // });

        Gate::define('update-article', function (User $user, Article $article) {
            return $user->id === $article->user_id || $user->status === 'Admin';
        });

        Gate::define('acces_admin', function (User $user) {
            return $user->is_admin;
        });
    }
}
