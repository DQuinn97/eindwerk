<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <form action="{{ route('messages.update',  $message->id) }}" method="POST" class="p-4 w-full">
                        @csrf    
                        @method('PATCH')
                        <fieldset class="fieldset w-full">
                            <legend class="fieldset-legend">Edit message</legend>
                            <textarea class="textarea h-24 w-full" placeholder="Message" id="message" name="message">{{ $message->message }}</textarea>
                        </fieldset>
                        <fieldset class="fieldset w-full">
                            <legend class="fieldset-legend">Visibility</legend>
                            <label class="label">
                                <input type="checkbox" checked="{{ $message->visible }}" class="checkbox" id="visible" name="visible"/>
                                <span class="label-text">Visible to other users</span>
                            </label>
                        </fieldset>
                        <input type="submit" class="btn btn-primary mt-5" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
