<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-form.breadcrumb :items="['Home', 'Governorates', $governorate->name]" :routes="['/', '/governorates', route('governorates.show', $governorate)]" />
        <x-alert />
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Governorate Name: {{ $governorate->name }}
            </h1>
            {{-- <p class="mt-4 text-gray-600 dark:text-gray-400">Created at:
                {{ $governorate->created_at->toFormattedDateString() }}</p> --}}
            <div class="mt-6">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Cities:</h2>
                @forelse ($governorate->cities as $city)
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $city->name }} : {{ $city->governorate->name }}
                    </p>
                @empty
                    <p class="mt-2 text-gray-600 dark:text-gray-400">No cities found for this governorate.</p>
                @endforelse
            </div>
            <div class="mt-6 flex space-x-2">
                <a href="{{ route('governorates.edit', $governorate->id) }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Edit
                </a>
                <form action="{{ route('governorates.destroy', $governorate->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure?');" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-
                        700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
