<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\UserCreated;
use App\Models\User;
use App\Observers\UserObserver;

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
        User::created(function ($user) {
            event(new UserCreated($user));
        });

        User::observe(UserObserver::class);
    }
}
