<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-form.breadcrumb :items="['Home', 'Donations', 'Show Donation']" :routes="['/', '/donations']" />
        <x-alert />
        <div class="max-w-3xl mx-auto p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Show Donation</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <x-form.label for="name">Donation Name</x-form.label>
                    <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="$donation->patient_name" required autofocus disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="phone">Phone</x-form.label>
                    <x-form.input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$donation->patient_phone_number" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="age">Age</x-form.label>
                    <x-form.input id="age" class="block mt-1 w-full" type="text" name="age" :value="$donation->patient_age" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="blood_bags">Blood Bags</x-form.label>
                    <x-form.input id="blood_bags" class="block mt-1 w-full" type="text" name="blood_bags" :value="$donation->bags_number" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="city">City</x-form.label>
                    <x-form.input id="city" class="block mt-1 w-full" type="text" name="city" :value="$donation->city->name" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="governorate">Governorate</x-form.label>
                    <x-form.input id="governorate" class="block mt-1 w-full" type="text" name="governorate" :value="$donation->governorate" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="blood_type">Blood Type</x-form.label>
                    <x-form.input id="blood_type" class="block mt-1 w-full" type="text" name="blood_type" :value="$donation->bloodType->name" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="client">Client</x-form.label>
                    <x-form.input id="client" class="block mt-1 w-full" type="text" name="client" :value="$donation->client->name" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="hospital">Hospital</x-form.label>
                    <x-form.input id="hospital" class="block mt-1 w-full" type="text" name="hospital" :value="$donation->hospital_name" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="hospital_address">Hospital Address</x-form.label>
                    <x-form.input id="hospital_address" class="block mt-1 w-full" type="text" name="hospital_address" :value="$donation->hospital_address" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="latitude">Latitude</x-form.label>
                    <x-form.input id="latitude" class="block mt-1 w-full" type="text" name="latitude" :value="$donation->latitude" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="longitude">Longitude</x-form.label>
                    <x-form.input id="longitude" class="block mt-1 w-full" type="text" name="longitude" :value="$donation->longitude" required disabled />
                </div>
                <div class="mb-4">
                    <x-form.label for="created_at">Created At</x-form.label>
                    <x-form.input id="created_at" class="block mt-1 w-full" type="text" name="created_at" :value="$donation->created_at" required disabled />
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{ route('donations.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
