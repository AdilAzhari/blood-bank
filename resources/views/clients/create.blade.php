<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">

        <x-form.breadcrumb :items="['Home', 'clients', 'Create New Client']" :routes="['/', '/clients']" />
        <x-alert />
        <div class="container mx-auto py-8 px-4 md:px-8">
            <div class="max-w-3xl mx-auto p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Create New Client</h2>
                <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Product Name -->
                    <div class="mb-4">
                        <x-form.label for="name">Client Name</x-form.label>
                        <x-form.input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="phone">Client Phone</x-form.label>
                        <x-form.input id="phone" class="block mt-1 w-full" type="text" name="phone"
                            :value="old('phone')" required autofocus />
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="email">Client Email</x-form.label>
                        <x-form.input id="email" class="block mt-1 w-full" type="text" name="email"
                            :value="old('email')" required autofocus />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="password">Client Password</x-form.label>
                        <x-form.input id="password" class="block mt-1 w-full" type="password" name="password"
                            :value="old('password')" required autofocus />
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="password_confirmation">Client Password Confirmation</x-form.label>
                        <x-form.input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" :value="old('password_confirmation')" required autofocus />
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="address">Client Address</x-form.label>
                        <x-form.input id="address" class="block mt-1 w-full" type="text" name="address"
                            :value="old('address')" required autofocus />
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="city_id">City</x-form.label>
                        <select name="city_id" id="city_id"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-300 dark:focus:ring-opacity-50">
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
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

                    <div class="mb-4">
                        <x-form.label for="blood_type_id">Blood Type</x-form.label>
                        <select name="blood_type_id" id="blood_type_id"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-300 dark:focus:ring-opacity-50">
                            <option value="">Select Blood Type</option>
                            @foreach ($bloodTypes as $bloodType)
                                <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                            @endforeach
                        </select>
                        @error('blood_type_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="birth_date">Birth Date</x-form.label>
                        <x-form.input id="birth_date" class="block mt-1 w-full" type="date" name="d_o_b"
                            :value="old('d_o_b')" required autofocus />
                        @error('dob')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="last_donation_date">Last Donation Date</x-form.label>
                        <x-form.input id="last_donation_date" class="block mt-1 w-full" type="date"
                            name="last_donation_date" :value="old('last_donation_date')" required autofocus />
                        @error('last_donation_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="status">Client Status</x-form.label>
                        <select name="status" id="status"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-300 dark:focus:ring-opacity-50">
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="notes">Client Details</x-form.label>
                        <x-form.input id="notes" class="block mt-1 w-full" type="text" name="notes"
                            :value="old('details')" required autofocus />
                        @error('notes')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-form.label for="image">Client Image</x-form.label>
                        <x-form.input id="image" class="block mt-1 w-full" type="file" name="image"
                            :value="old('image')" autofocus />
                        @error('image')
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
