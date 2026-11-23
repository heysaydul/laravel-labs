<?php

namespace App\Providers;


use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // সবার আগে চলে: মডারেটর হলে সব অনুমতি, নইলে null (অন্য নিয়ম দেখো)
        Gate::before(fn (User $user) => $user->isModerator() ? true : null);
    
        // যেকোনো লগইন করা ইউজার কমেন্ট করতে পারে
        Gate::define('add-comment', fn (User $user) => true);
    
        // কমেন্ট মোছা: মডারেটর আগেই পার হয়ে যায়, বাকিরা এই বার্তা পায়
        Gate::define('delete-comment', fn (User $user, Comment $comment) =>
            Response::deny('Only a moderator can delete comments.'));
    }
}
