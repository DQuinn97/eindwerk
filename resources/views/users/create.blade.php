<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <form action="{{ route('users.store') }}" method="POST" class="p-4 w-full">
                        @csrf    
                        <fieldset class="fieldset w-full">
                            <legend class="fieldset-legend">User Email</legend>
                            <input type="email" class="input w-full" placeholder="Email" id="email" name="email"></input>
                        </fieldset>
                        <fieldset class="fieldset w-full">
                            <legend class="fieldset-legend">Role</legend>
                            <select class="select">
                                <option disabled selected>Select Role</option>
                                @foreach ($roles as $role) 
                                    <option value={{ $role->id }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                        <input type="submit" class="btn btn-primary mt-5" value="Send">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
