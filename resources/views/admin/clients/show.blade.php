<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-form.breadcrumb :items="['Home', 'Clients', $client->name]" :routes="['/', '/clients', route('clients.show', $client)]" />
        <x-alert />
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Client Name: {{ $client->name }}</h1>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Client Phone: {{ $client->phone }}</p>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Client Email: {{ $client->email }}</p>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Client Governorate:
                {{ $governorates ?? 'No City Been Allocated To This Client' }}</p>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Client Email: {{ $client->status }}</p>

            <p class="mt-4 text-gray-600 dark:text-gray-400">Client City: {{ $client->city->name ?? 'has no city No' }}
            </p>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Client Blood Type: {{ $client->bloodType->name }}</p>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Client Last Donation Date: {{ $client->last_donation_date }}
            </p>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Client Birth Date: {{ $client->d_o_b }}</p>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Created at:
                {{ $client->created_at->toFormattedDateString() }}</p>
            <div class="mt-6 flex space-x-2">
                <a href="{{ route('clients.edit', $client->id) }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Edit
                </a>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure?');" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete
                    </button>
                </form>
            </div>
            <div class="mt-8">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100">Related Posts</h2>
                <ul class="mt-4">
                    {{-- @forelse ($client->posts as $post)
                        <li class="text-gray-600 dark:text-gray-400">{{ $post->title }}
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </li>
                    @empty
                        <li class="text-gray-600 dark:text-gray-400">No Posts Found</li>
                    @endforelse --}}
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
