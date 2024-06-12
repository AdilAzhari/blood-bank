<div id="sidebar"
    class="fixed left-0 z-50 bg-white dark:bg-gray-800 w-64 overflow-y-auto pt-6 transition duration-300 ease-in-out transform -translate-x-full">
    <div class="flex items-center px-4 py-2 mb-6">
        <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800 dark:text-white">Your App Name</a>
    </div>

    <ul class="space-y-2">
        <li>
            <a href="{{ route('dashboard') }}"
                class="text-gray-700 dark:text-gray-200 hover:text-gray-800 dark:hover:text-white px-4 py-2 rounded-md flex items-center">
                <i class="mr-2 fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="#"
                class="text-gray-700 dark:text-gray-200 hover:text-gray-800 dark:hover:text-white px-4 py-2 rounded-md flex items-center">
                <i class="mr-2 fas fa-users"></i> Users
            </a>
        </li>
    </ul>
</div>
