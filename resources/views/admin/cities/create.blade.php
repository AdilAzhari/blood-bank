<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">

        <x-form.breadcrumb :items="['Home', 'Cities', 'Create New City']" :routes="['/', '/Cities']" />
        <x-alert />
        <div class="container mx-auto py-8 px-4 md:px-8">
            <div class="max-w-3xl mx-auto p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Create New city</h2>
                <form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Product Name -->
                    <div class="mb-4">
                        <x-form.label for="name">City Name</x-form.label>
                        <x-form.input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Governorate -->
                    <div class="mb-4">
                        <x-form.label for="governorate_id">Governorate</x-form.label>
                        <select name="governorate_id" id="governorate_id"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-300 dark:focus:ring-opacity-50">
                            <option value="">Select Governorate</option>
                            @foreach ($governorates as $governorate)
                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                            @endforeach
                        </select>
                        @error('governorate_id')
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
