@extends('layouts.app')

@section('title', 'City Details')

@section('content')
    <h2>City Details</h2>
    <p><strong>City Name:</strong> {{ $city->city_name }}</p>
    <p><strong>State:</strong> {{ $city->state->state_name }}</p>
    <p><strong>Country:</strong> {{ $city->state->country->country_name }}</p>
    <a href="{{ route('cities.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
