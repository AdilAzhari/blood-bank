<x-app-layout>
    <x-form.breadcrumb :items="['Home', 'Roles', $role->name]" :routes="['/', '/roles', route('roles.show', $role)]" />
    <x-alert />

    <div class="container mx-auto py-8 px-4 md:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $role->name }}</h1>
                <a href="{{ route('roles.edit', $role->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">{{ __('Edit Role') }}</a>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">{{ __('Role Description') }}</h2>
                <p class="text-gray-700 dark:text-gray-300">{{ $role->description ?? 'No description available.' }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">{{ __('Permissions') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($role->permissions as $permission)
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                {{ $permission->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
