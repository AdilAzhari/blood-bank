<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">

        <x-form.breadcrumb :items="['Home', 'Categories', 'Create New category']" :routes="['/', '/categories']" />
        <x-alert />
        <div class="container mx-auto py-8 px-4 md:px-8">
            <div class="max-w-3xl mx-auto p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Create New Category</h2>
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Product Name -->
                    <div class="mb-4">
                        <x-form.label for="name">Category Name</x-form.label>
                        <x-form.input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-4">
                        <x-form.button type="submit">
                            Create
                        </x-form.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
