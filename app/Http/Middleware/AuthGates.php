<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $roles = Role::with("permissions")->get();
            $permissions_array = [];
            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    $permissions_array[$permission->name][] = $role->id;
                }
            }
            foreach ($permissions_array as $name => $roles) {
                Gate::define($name, function ($user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
            $request->merge(['permissions' => $permissions_array]);
        }


        return $next($request);
    }
}
