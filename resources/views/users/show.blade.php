<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <button><a href="{{ route('messages.create') }}" class="btn btn-primary mb-5">Create Message</a></button>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Visible</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
 
                                <tr>
                                    <td>{{ $message->user_id}}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->created_at }}</td>
                                    <td>{{ $message->visible }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('messages.edit', $message->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
