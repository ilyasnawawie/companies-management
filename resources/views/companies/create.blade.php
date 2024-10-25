@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-3xl p-6 bg-white shadow-lg rounded-lg">
        <!-- Button -->
        <div class="mb-4">
            <a href="{{ route('companies.index') }}" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                Back to List
            </a>
        </div>

        <h1 class="text-3xl font-bold text-center mb-6 text-indigo-600">Create a New Company</h1>
        
        @livewire('company-form-view')
    </div>
@endsection
