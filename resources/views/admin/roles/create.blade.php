<x-app-layout>
    <x-form.breadcrumb :items="['Home', 'Roles', 'Create']" :routes="['/', '/roles', route('roles.create')]" />
    <x-alert />

    <div class="container mx-auto py-8 px-4 md:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Update Role') }}</h1>
            </div>
            <form method="POST" action="{{ route('roles.store')}}">
                @csrf
                {{-- <input type="text" id="id" name="id" value="{{ $role->id }}" readonly required hidden /> --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Role Name') }}</label>
                    <input type="text" required name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"" />
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Description') }}</label>
                    <textarea name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                </div>
                <div class="mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ __('Permissions') }}</h2>
                    <div class="mb-2">
                        <input type="checkbox" id="check_all" class="mr-2">
                        <label for="check_all" class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Check All') }}</label>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center">
                                <input type="checkbox" name="permission[]" id="permission_{{ $permission->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-indigo-600" />
                                <label for="permission_{{ $permission->id }}" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <input type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150" value="{{ __('Save') }}" />
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('check_all').addEventListener('click', function() {
        let checkboxes = document.querySelectorAll('input[name="permission[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
</script>
