<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-form.breadcrumb :items="['Home', 'Permissions']" :routes="['/', '/permissions']" />
        <x-alert />
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">{{ __('Permissions') }}</h1>

            <div class="mb-6">
                <form action="{{ route('permissions.index') }}" method="GET" class="flex items-center mb-4">
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="Search Permissions">
                    <button type="submit"
                        class="ml-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Search</button>
                </form>

                <form action="{{ route('permissions.store') }}" method="POST" class="flex items-center">
                    @csrf
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="New Permission" required>
                    <button type="submit"
                        class="ml-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add</button>
                </form>
            </div>

            <div class="flex flex-wrap -mx-2">
                @forelse ($permissions as $permission)
                    <div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-4">
                        <div class="bg-white dark:bg-gray-700 rounded shadow p-4 flex items-center justify-between">
                            <div>
                                <span
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">{{ $permission->name }}</span>
                            </div>
                            <div>
                                <a href="{{ route('permissions.edit', $permission->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                <form class="inline" method="POST"
                                    action="{{ route('permissions.destroy', $permission->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-900 focus:outline-none">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full px-2 mb-4">
                        <div class="bg-white dark:bg-gray-700 rounded shadow p-4 text-center">
                            <span class="text-sm text-gray-500 dark:text-gray-300">No permissions found</span>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
