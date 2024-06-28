<x-app-layout>
    <x-form.breadcrumb :items="['Home', 'Roles', 'Create']" :routes="['/', '/roles', route('roles.create')]" />
    <x-alert />
    <div class="container mx-auto py-8 px-4 md:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ 'Roles And Permissions' }}</h1>
                <a href="{{ route('roles.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">{{ __('Create Roles') }}</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">{{ __('Name') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('Description') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr
                                class="border-b dark:border-gray-700 odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800">
                                <td class="px-4 py-3"> <a
                                        href="{{ route('roles.show', $role) }}">{{ $role->name }}</a>
                                </td>
                                <td class="px-4 py-3">{{ $role->description }}</td>
                                <td class="px-4 py-3 flex space-x-2">
                                    <a href="{{ route('roles.edit', $role) }}"
                                        class="inline-flex items-center px-2 py-1 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">{{ __('Edit') }}</a>
                                    <a href="{{ route('roles.destroy', $role) }}"
                                        class="inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
