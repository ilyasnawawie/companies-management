<div class="container mx-auto p-6 max-w-7xl bg-white shadow rounded-lg relative">
    <!-- Header Section -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Companies</h2>

    <!-- Add Button -->
    <div class="mb-8 text-left">
        <a href="{{ route('companies.create') }}"
            class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow">
            Add New Company
        </a>
    </div>

    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Company Table -->
    @if($companies->isEmpty())
        <p class="text-gray-500">No companies found.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Website</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($companies as $company)
                        <tr class="hover:bg-gray-50 transition">
                            <!-- Company Name -->
                            <td class="px-6 py-4 whitespace-nowrap flex items-center">
                                @if ($company->logo)
                                    <img src="{{ Storage::url($company->logo) }}" alt="Logo" class="w-10 h-10 rounded-full mr-3">
                                @endif
                                <span class="text-gray-900 truncate block w-32" title="{{ $company->name }}">
                                    {{ Str::limit($company->name, 20) }}
                                </span>
                            </td>
                            <!-- Company Email -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-gray-500 truncate block w-48" title="{{ $company->email }}">
                                    {{ Str::limit($company->email, 30) }}
                                </span>
                            </td>
                            <!-- Company Website -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-gray-500 truncate block w-48" title="{{ $company->website }}">
                                    {{ Str::limit($company->website, 30) }}
                                </span>
                            </td>
                            <!-- Action Buttons -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-4">
                                    <!-- Edit Button -->
                                    <a href="{{ route('companies.edit', $company->id) }}"
                                        class="text-blue-500 hover:text-blue-700 font-semibold">Edit</a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this company?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 text-center">
            {{ $companies->links('pagination::tailwind-custom') }}
        </div>

    @endif
</div>
