<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-form.breadcrumb :items="['Home', 'Posts', 'Edit Post']" :routes="['/', '/posts']" />
        <x-alert />
        <div class="max-w-3xl mx-auto p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Edit Post</h2>
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Post Title -->
                <div class="mb-4">
                    <x-form.label for="title">Post Title</x-form.label>
                    <x-form.input id="title" class="block mt-1 w-full" type="text" name="title"
                        :value="old('title', $post->title)" required autofocus />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Post Content -->
                <div class="mb-4">
                    <x-form.label for="content">Post Content</x-form.label>
                    <x-form.textarea id="content" class="block mt-1 w-full" name="content" required>
                        {{ old('content', $post->content) }}
                    </x-form.textarea>
                    @error('content')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Post Category --}}
                <div class="mb-4">
                    <x-form.label for="category_id">Category</x-form.label>
                    <select name="category_id" id="category_id"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-300 dark:focus:ring-opacity-50">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                <!-- Post Image -->
                <div class="mb-4">
                    <x-form.label for="image">Post Image</x-form.label>
                    <x-form.input id="image" class="block mt-1 w-full" type="file" name="image" />
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end mt-4">
                    <x-form.button type="submit">
                        Update
                    </x-form.button>
                </div>
            </form>
        </div>
    </div
</x-app-layout>
