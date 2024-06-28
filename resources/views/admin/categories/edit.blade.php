<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-form.breadcrumb :items="['Home', 'category', 'Edit']" :routes="['/', '/categories', route('cities.edit', $category->id)]" />
        <x-alert />
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Edit category</h1>
            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="mt-6 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <x-form.label for="name" :value="__('Name')" />
                    <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $category->name)" required autofocus />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
