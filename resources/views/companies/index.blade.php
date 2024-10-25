@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-7xl bg-white shadow rounded-lg">
    <!-- Company List View -->
    <div class="mb-6">
        @livewire('company-list-view')
    </div>

    <!-- Logout Button -->
    <div class="flex justify-start">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
        <button 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg shadow">
            Logout
        </button>
    </div>
</div>
@endsection
