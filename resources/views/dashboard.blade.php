<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-81">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('categories.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Categories
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your categories.</p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Total: {{ $categoryCount }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('cities.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Cities
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your cities.</p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Total: {{ $cityCount }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('posts.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Posts
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your posts.</p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Total: {{ $postCount }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('governorates.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Governorates
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your governorates.</p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Total: {{ $governorateCount }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('contacts.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Contacts
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your contacts.</p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Total: {{ $contactCount }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('users.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Users
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your Users.</p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Total: {{ $usersCount }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('blood_types.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Blood Types
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your blood clients.</p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Total: {{ $donationCount }}</p>
                        </div> <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('clients.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Clients
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your donations.</p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Total: {{ $donationCount }}</p>
                        </div> <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('donations.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Donations
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your donations.</p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Total: {{ $donationCount }}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('roles.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Roles And Permissions
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your settings.</p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Total: {{ $settingsCount }}</p>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <a href="{{ route('settings.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Settings
                            </a>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Manage your settings.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
