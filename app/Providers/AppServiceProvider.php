<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        
    }

    public function boot(): void
    {
        Paginator::defaultView('pagination::bootstrap-5');
        Gate::define('change-user', function (User $user_auth, User $user){
            return $user_auth->id === $user->id;
        });
        Gate::define('change-post', function (User $user_auth, Post $post){
            return $user_auth->id === $post->id_user;
        });
        Gate::define('change-comment', function (User $user_auth, Post $comment){
            return $user_auth->id === $comment->id_user OR $user_auth->id === $comment->post()->id_user;
        });
    }
}
