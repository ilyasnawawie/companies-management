<div>
    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Company Form -->
    <form wire:submit.prevent="submit">
        <div>
            <label for="name">Company Name:</label>
            <input type="text" id="name" wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email">Company Email:</label>
            <input type="email" id="email" wire:model="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="logo">Company Logo (optional):</label>
            <input type="file" id="logo" wire:model="logo">
            @error('logo') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="website">Company Website:</label>
            <input type="url" id="website" wire:model="website">
            @error('website') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">{{ $company ? 'Update Company' : 'Create Company' }}</button>
    </form>
</div>
