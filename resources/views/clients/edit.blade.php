<x-app-layout>
    <div class="container mx-auto py-6 px-4 md:px-6">
        <x-form.breadcrumb :items="['Home', 'Client', 'Edit']" :routes="['/', '/clients', route('clients.edit', $client->id)]" />
        <x-alert />
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
            <h1 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Edit Client</h1>
            <form action="{{ route('clients.update', $client->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-form.label for="name" :value="__('Name')" />
                        <x-form.input id="name" class="block w-full" type="text" name="name" :value="old('name', $client->name)"
                            required autofocus />
                    </div>
                    <div>
                        <x-form.label for="phone" :value="__('Phone')" />
                        <x-form.input id="phone" class="block w-full" type="text" name="phone"
                            :value="old('phone', $client->phone)" required />
                    </div>
                </div>

                <div>
                    <x-form.label for="email" :value="__('Email')" />
                    <x-form.input id="email" class="block w-full" type="text" name="email"
                        :value="old('email', $client->email)" required />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-form.label for="d_o_b" :value="__('Date of Birth')" />
                        <x-form.input id="d_o_b" class="block w-full" type="date" name="d_o_b"
                            :value="old('d_o_b', $client->d_o_b)" required />
                    </div>
                    <div>
                        <x-form.label for="last_donation_date" :value="__('Last Donation Date')" />
                        <x-form.input id="last_donation_date" class="block w-full" type="date" name="last_donation_date"
                            :value="old('last_donation_date', $client->last_donation_date)" required />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <x-form.label for="city_id" :value="__('City')" />
                        <select name="city_id" id="city_id"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-300 dark:focus:ring-opacity-50">
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ $client->city_id == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-form.label for="governorate_id" :value="__('Governorate')" />
                        <select name="governorate_id" id="governorate_id"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-300 dark:focus:ring-opacity-50">
                            <option value="">Select Governorate</option>
                            @foreach ($governorates as $governorate)
                                <option value="{{ $governorate->id }}"
                                    {{ $client->governorate_id == $governorate->id ? 'selected' : '' }}>
                                    {{ $governorate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-form.label for="blood_type_id" :value="__('Blood Type')" />
                        <select name="blood_type_id" id="blood_type_id"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-300 dark:focus:ring-opacity-50">
                            <option value="">Select Blood Type</option>
                            @foreach ($bloodTypes as $bloodType)
                                <option value="{{ $bloodType->id }}"
                                    {{ $client->blood_type_id == $bloodType->id ? 'selected' : '' }}>
                                    {{ $bloodType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <x-form.label for="status" :value="__('Status')" />
                    <select name="status" id="status"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-300 dark:focus:ring-opacity-50">
                        <option value="active" {{ $client->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $client->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
