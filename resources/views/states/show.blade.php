@extends('layouts.app')

@section('title', 'State Details')

@section('content')
    <h2>State Details</h2>
    <p><strong>State Name:</strong> {{ $state->state_name }}</p>
    <p><strong>Country:</strong> {{ $state->country->country_name }}</p>
    <a href="{{ route('states.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
