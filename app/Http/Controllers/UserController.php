<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role_filter = $request->query('role');
        abort_if(Gate::denies('manage_users'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $users = User::with('role')->get()->filter(function($user ) use ($role_filter) {
            if (!$role_filter) {
                return true;
            }
            return $user->role->id == $role_filter;
        });
        $roles = Role::all();
        return view('users.index', compact('users', 'roles', 'role_filter'), );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('manage_users'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $roles = Role::get();
        return view('users.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->validated());        
        $user->role()->sync($request->input('role'));

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        abort_if(Gate::denies('manage_users'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('manage_users'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $roles = Role::get();
        $user->load('role');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->validated());
        $user->role()->sync($request->input('role'));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('manage_users'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $user->delete();
        return redirect()->route('users.index');
    }
}
