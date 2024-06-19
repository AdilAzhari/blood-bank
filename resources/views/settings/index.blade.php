<x-app-layout>
    <x-form.breadcrumb :items="['Home', 'Settings']" :routes="['/', route('settings.index')]" />
    <x-alert />
    <div class="container mx-auto py-8 px-4 md:px-8">
        <div class="max-w-4xl mx-auto p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Settings</h2>
            <form action="{{ route('settings.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    <!-- About App -->
                    <div class="md:col-span-2">
                        <x-form.label for="about_app">About App</x-form.label>
                        <x-form.textarea id="about_app" class="block mt-1 w-full" name="about_app" required>{{ old('about_app', $settings->about_app) }}</x-form.textarea>
                        @error('about_app')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Notification Setting Text -->
                    <div>
                        <x-form.label for="notification_setting_text">Notification Setting Text</x-form.label>
                        <x-form.input id="notification_setting_text" class="block mt-1 w-full" type="text" name="notification_setting_text" :value="old('notification_setting_text', $settings->notification_setting_text)" required />
                        @error('notification_setting_text')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Instagram Link -->
                    <div>
                        <x-form.label for="insta_link">Instagram Link</x-form.label>
                        <x-form.input id="insta_link" class="block mt-1 w-full" type="url" name="insta_link" :value="old('insta_link', $settings->insta_link)" required />
                        @error('insta_link')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Twitter Link -->
                    <div>
                        <x-form.label for="tw_link">Twitter Link</x-form.label>
                        <x-form.input id="tw_link" class="block mt-1 w-full" type="url" name="tw_link" :value="old('tw_link', $settings->tw_link)" required />
                        @error('tw_link')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Facebook Link -->
                    <div>
                        <x-form.label for="fb_link">Facebook Link</x-form.label>
                        <x-form.input id="fb_link" class="block mt-1 w-full" type="url" name="fb_link" :value="old('fb_link', $settings->fb_link)" required />
                        @error('fb_link')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <x-form.label for="email">Email</x-form.label>
                        <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $settings->email)" required />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <x-form.label for="phone_number">Phone Number</x-form.label>
                        <x-form.input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number', $settings->phone_number)" required />
                        @error('phone_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="flex justify-end mt-4">
                    <x-form.button type="submit">
                        Update
                    </x-form.button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
