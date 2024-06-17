{{-- <x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-form.breadcrumb :items="['Home', 'Settings']" :routes="['/', route('settings.index')]" />
        <x-alert />
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Settings</h1>
            <form action="{{ route('settings.update') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <x-form.label for="notification_setting_text" :value="__('Notification Setting Text')" />
                    <x-form.input id="notification_setting_text" class="block mt-1 w-full" type="text" name="notification_setting_text"
                        :value="old('notification_setting_text', $settings->notification_setting_text)" required />
                </div>

                <div>
                    <x-form.label for="insta_link" :value="__('Instagram Link')" />
                    <x-form.input id="insta_link" class="block mt-1 w-full" type="url" name="insta_link"
                        :value="old('insta_link', $settings->insta_link)" required />
                </div>

                <div>
                    <x-form.label for="tw_link" :value="__('Twitter Link')" />
                    <x-form.input id="tw_link" class="block mt-1 w-full" type="url" name="tw_link"
                        :value="old('tw_link', $settings->tw_link)" required />
                </div>

                <div>
                    <x-form.label for="email" :value="__('Email')" />
                    <x-form.input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email', $settings->email)" required />
                </div>

                <div>
                    <x-form.label for="phone_number" :value="__('Phone Number')" />
                    <x-form.input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                        :value="old('phone_number', $settings->phone_number)" required />
                </div>

                <div>
                    <x-form.label for="about_app" :value="__('About App')" />
                    <x-form.textarea id="about_app" class="block mt-1 w-full" name="about_app" required>{{ old('about_app', $settings->about_app) }}</x-form.textarea>
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
</x-app-layout> --}}
<x-app-layout>
    <x-form.breadcrumb :items="['Home', 'Settings']" :routes="['/', route('settings.index')]" />
    <x-alert />
    <div class="container mx-auto py-8 px-4 md:px-8">
        <div class="max-w-3xl mx-auto p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Settings</h2>
            <form action="{{ route('settings.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- about_app --}}
                <div class="mb-4">
                    <x-form.label for="about_app">About App</x-form.label>
                    <x-form.textarea id="about_app" class="block mt-1 w-full" name="about_app"
                        required>{{ old('about_app', $settings->about_app) }}</x-form.textarea>
                    @error('about_app')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notification Setting Text -->
                <div class="mb-4">
                    <x-form.label for="notification_setting_text">Notification Setting Text</x-form.label>
                    <x-form.input id="notification_setting_text" class="block mt-1 w-full" type="text"
                        name="notification_setting_text" :value="old('notification_setting_text', $settings->notification_setting_text)" required />
                    @error('notification_setting_text')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Instagram Link -->
                <div class="mb-4">
                    <x-form.label for="insta_link">Instagram Link</x-form.label>
                    <x-form.input id="insta_link" class="block mt-1 w-full" type="url" name="insta_link"
                        :value="old('insta_link', $settings->insta_link)" required />
                    @error('insta_link')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Twitter Link -->
                <div class="mb-4">
                    <x-form.label for="tw_link">Twitter Link</x-form.label>
                    <x-form.input id="tw_link" class="block mt-1 w-full" type="url" name="tw_link"
                        :value="old('tw_link', $settings->tw_link)" required />
                    @error('tw_link')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- fb_link --}}
                <div class="mb-4">
                    <x-form.label for="fb_link">Facebook Link</x-form.label>
                    <x-form.input id="fb_link" class="block mt-1 w-full" type="url" name="fb_link"
                        :value="old('email', $settings->fb_link)" required />
                    @error('fb_link')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email', $settings->email)" required />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <x-form.label for="phone_number">Phone Number</x-form.label>
                    <x-form.input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                        :value="old('phone_number', $settings->phone_number)" required />
                    @error('phone_number')
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
    </div>

</x-app-layout>
