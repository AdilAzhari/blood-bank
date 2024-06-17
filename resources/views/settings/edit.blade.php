<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-alert />
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Settings</h1>
            <form action="{{ route('settings.update') }}" method="POST" class="mt-6 space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <x-form.label for="site_name" :value="__('Site Name')" />
                    <x-form.input id="site_name" name="site_name" type="text" class="mt-1 block w-full" :value="old('site_name', $settings->site_name)" required />
                </div>
                <div>
                    <x-form.label for="site_email" :value="__('Site Email')" />
                    <x-form.input id="site_email" name="site_email" type="email" class="mt-1 block w-full" :value="old('site_email', $settings->site_email)" required />
                </div>
                <div class="flex justify-end">
                    <x-button class="ml-3">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
