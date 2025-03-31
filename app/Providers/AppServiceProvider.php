<?php

namespace App\Providers;

use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

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
        Gate::before(function ($user, $ability) {
            return $user->hasRole("admin") ? true : null;
        });
        // OrderResource::withoutWrapping();

    }
}
