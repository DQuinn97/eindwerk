<?php

namespace App\Providers;

use App\Models\Permission;
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
    public function boot(): void
    {
        $hasPermissionTable = Schema::hasTable('public.connections');
        $hasUserTable = Schema::hasTable('public.users');
        $hasRoleTable = Schema::hasTable('public.roles');
        $hasPermissionRoleTable = Schema::hasTable('public.permission_role');

        if ($hasPermissionTable && $hasUserTable && $hasRoleTable && $hasPermissionRoleTable) {
            Permission::all()->each(function ($permission) {
                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission->name);
                });
            });
        }
    }
}
