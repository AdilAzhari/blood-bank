<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-form.breadcrumb :items="['Home', 'Clients']" :routes="['/', '/Clients']" />
        <x-alert />
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Clients</h1>
            <a href="{{ route('clients.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path
                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                </svg>
                Add new Client
            </a>
        </div>
        <form action="{{ route('clients.index') }}" method="GET"
            class="mb-6 flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 items-center">
            <div class="flex-grow md:w-1/3">
                <x-form.input name="name" placeholder="Search by name" />
            </div>
            <div class="md:w-40">
                <select name="status"
                    class="form-select mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="">Select a status</option>
                    <option value="">All</option>
                    <option value="active" @selected(request('status') == 'active')>Active</option>
                    <option value="inactive" @selected(request('status') == 'inactive')>Inactive</option>
                </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Search
            </button>
        </form>
        <div class="max-w-6xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">ID</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Phone</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Pin Code</th>
                            <th scope="col" class="px-4 py-3">Blood Type</th>
                            <th scope="col" class="px-4 py-3">Birth Date</th>
                            <th scope="col" class="px-4 py-3">Last Donation Date</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">City</th>
                            <th scope="col" class="px-4 py-3">Governorate</th>
                            <th scope="col" class="px-4 py-3">Created At</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clients as $client)
                            <tr
                                class="border-b dark:border-gray-700 odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800">
                                <td class="px-4 py-3">{{ $client->id }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{ route('clients.show', $client) }}"
                                        class="text-blue-600 hover:underline">{{ $client->name }}</a>
                                </td>
                                <td class="px-4 py-3">{{ $client->phone }}</td>
                                <td class="px-4 py-3">{{ $client->email }}</td>
                                <td class="px-4 py-3">{{ $client->pin_code }}</td>
                                <td class="px-4 py-3">{{ $client->bloodType->name }}</td>
                                <td class="px-4 py-3">{{ $client->d_o_b }}</td>
                                <td class="px-4 py-3">{{ $client->last_donation_date }}</td>
                                <td class="px-4 py-3">{{ $client->status }}</td>
                                <td class="px-4 py-3">{{ $client->city->name ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $client->governorates->pluck('name')->first() ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $client->created_at->diffForHumans() }}</td>
                                <td class="px-4 py-3 flex space-x-2">
                                    <a href="{{ route('clients.edit', $client->id) }}"
                                        class="inline-flex items-center px-2 py-1 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Edit
                                    </a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="px-4 py-3 text-center">No Client found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $clients->links() }}
        </div>
    </div>
</x-app-layout>
