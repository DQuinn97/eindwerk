<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <button><a href="{{ route('users.create') }}" class="btn btn-primary mb-5">Create New User</a></button>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <div class="border-b-2">
                        <span class="px-2">Filter by Role:</span>
                        <select class="select" onchange="filterByRole()" id="role_filter">
                            <option value="" selected={{  $role_filter == "" }}>-</option>
                            @foreach ($roles as $role) 
                                <option value={{ $role->id }} @if ($role->id == $role_filter) selected @endif
                                
                                >{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <script>
                            function filterByRole() {
                                let queryString = window.location.search;
                                let urlParams = new URLSearchParams(queryString);
                                let role_filter = document.getElementById('role_filter').value;
                                if(role_filter) {
                                    urlParams.set('role', role_filter);
                                } else {
                                    urlParams.delete('role');
                                }
                                window.location.href = `?${urlParams.toString()}`;
                            }
                        </script>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="data-filter-parent">
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id}}</td>
                                    <td class="data-filter-email">{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="data-filter-role">{{ $user->role->name }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">Show</a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
