@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Company</h1>
        @livewire('company-form-view', ['companyId' => $company->id])
    </div>
@endsection
