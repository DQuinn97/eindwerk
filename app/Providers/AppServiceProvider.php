<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
    public function boot(UrlGenerator $url): void
    {
        if (env('APP_ENV') !== 'local') {
            $url->forceScheme('https');
        }
        

        Gate::define('admin', function ($user) {
            return $user->role()->name === 'admin';
        });
        Gate::define('mod', function ($user) {
            return $user->role()->name === 'mod' || $user->role()->name === 'admin';
        });
          
    }
}
