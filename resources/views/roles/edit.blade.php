<!-- resources/views/roles/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-form.label for="name" :value="__('Role Name')" />
                            <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="$role->name" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-form.label for="permissions" :value="__('Permissions')" />
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach ($permissions as $permission)
                                    <div>
                                        <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}"
                                            {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                        <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-button>{{ __('Update Role') }}</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
