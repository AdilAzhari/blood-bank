<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-form.breadcrumb :items="['Home', 'Posts', 'Create']" :routes="['/', '/posts', route('posts.create')]" />
        <x-alert />
        <div class="max-w-6xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Create Post</h1>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <x-form.label for="title" :value="__('Title')" />
                    <x-form.input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                </div>

                <div class="mb-4">
                    <x-form.label for="content" :value="__('Content')" />
                    <x-form.textarea id="content" class="block mt-1 w-full" name="content" required>{{ old('content') }}</x-form.textarea>
                </div>

                <div class="mb-4">
                    <x-form.label for="image" :value="__('Image')" />
                    <x-form.input id="image" class="block mt-1 w-full" type="file" name="image" />
                </div>

                <div class="mb-4">
                    <x-form.label for="category_id" :value="__('Category')" />
                    <select name="category_id" id="category_id"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-300 dark:focus:ring-opacity-50">
                        <option value="">{{ __('Select Category') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end">
                    <x-button class="bg-blue-600 hover:bg-blue-500">
                        {{ __('Create Post') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
