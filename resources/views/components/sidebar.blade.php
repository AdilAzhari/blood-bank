<!-- resources/views/components/sidebar.blade.php -->
<div class="flex flex-col h-full">
    <div class="flex items-center justify-center py-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Menu</h1>
    </div>
    <nav class="flex-1 px-2 space-y-1">
        <a href="{{ route('categories.index') }}"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
            Categories
        </a>
        <a href="{{ route('cities.index') }}"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
            Cities
        </a>
        <a href="{{ route('posts.index') }}"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
            Posts
        </a>
        <a href="{{ route('governorates.index') }}"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
            Governorates
        </a>
        <a href="{{ route('roles.index') }}"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
            Roles
        </a>
        <a href="{{ route('permissions.index') }}"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
            Permissions
        </a>
        <a href="{{ route('settings.index') }}"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
            Settings
        </a>
    </nav>
</div>
