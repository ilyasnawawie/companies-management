<div class="bg-white p-6 rounded-lg shadow-lg">
    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Company Form -->
    <form wire:submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Company Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Company Name:</label>
            <input type="text" id="name" wire:model="name" maxlength="50"
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="Enter company name (Max 50 chars)">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Company Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Company Email:</label>
            <input type="email" id="email" wire:model="email" maxlength="50"
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="Enter email (Max 50 chars)">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Company Logo -->
        <div>
            <label for="logo" class="block text-sm font-medium text-gray-700">Company Logo (optional):</label>
            <input type="file" id="logo" wire:model="logo"
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('logo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Company Website -->
        <div>
            <label for="website" class="block text-sm font-medium text-gray-700">Company Website:</label>
            <input type="url" id="website" wire:model="website" maxlength="100"
                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="Enter website URL (Max 100 chars)">
            @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="md:col-span-2 text-center mt-4">
            <button type="submit"
                class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg">
                {{ $company ? 'Update Company' : 'Create Company' }}
            </button>
        </div>
    </form>
</div>