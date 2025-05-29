@extends('layouts.app')

@section('title', 'Country Details')

@section('content')
    <h2>Country Details</h2>
    <p><strong>Country Name:</strong> {{ $country->country_name }}</p>
    <a href="{{ route('countries.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
