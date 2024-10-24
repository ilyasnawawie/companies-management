<div class="container">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Companies</h2>
        <a href="{{ route('companies.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded-lg">Add New Company</a>
    </div>

    @if($companies->isEmpty())
        <p class="text-gray-500">No companies found.</p>
    @else
        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Website</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 flex items-center">
                            @if ($company->logo)
                                <img src="{{ Storage::url($company->logo) }}" alt="Logo" class="w-10 h-10 rounded-full mr-2">
                            @endif
                            <span>{{ $company->name }}</span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $company->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $company->website }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex space-x-4">
                                <!-- Edit Form -->
                                <a href="{{ route('companies.edit', $company->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                <!-- Delete Form -->
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
</div>
