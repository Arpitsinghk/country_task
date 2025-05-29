@extends('layouts.app')

@section('title', 'Create City')

@section('content')
    <h1 class="text-center h4 mb-4">Create City</h1>
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="state_id" class="form-label">State</label>
            <select name="state_id" id="state_id" class="form-control" required>
                <option value="">Select State</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="city_name" class="form-label">City Name</label>
            <input type="text" name="city_name" id="city_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
        <a href="{{ route('cities.index') }}" class="btn btn-info btn-sm">Back</a>
    </form>
@endsection
