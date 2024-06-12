<div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Governorates</h1>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-4">
        <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                {{ $isEditMode ? 'Update' : 'Add' }}
            </button>
            @if ($isEditMode)
                <button type="button" wire:click="resetInputFields" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
            @endif
        </form>
    </div>

    <table class="w-full bg-white rounded-md shadow-md">
        <thead>
            <tr class="bg-gray-200 text-left text-sm font-medium text-gray-700">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($governorates as $governorate)
                <tr class="border-t border-gray-200 text-sm">
                    <td class="px-4 py-2">{{ $governorate->name }}</td>
                    <td class="px-4 py-2">
                        <button wire:click="edit({{ $governorate->id }})" class="px-4 py-2 bg-yellow-500 text-white rounded">Edit</button>
                        <button wire:click="delete({{ $governorate->id }})" class="px-4 py-2 bg-red-500 text-white rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $governorates->links() }}
</div>
