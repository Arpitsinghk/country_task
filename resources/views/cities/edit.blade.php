@extends('layouts.app')

@section('title', 'Edit City')

@section('content')
    <h2>Edit City</h2>
    <form action="{{ route('cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="state_id" class="form-label">State</label>
            <select name="state_id" id="state_id" class="form-control" required>
                <option value="">Select State</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ $city->state_id == $state->id ? 'selected' : '' }}>
                        {{ $state->state_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="city_name" class="form-label">City Name</label>
            <input type="text" name="city_name" id="city_name" class="form-control" value="{{ $city->city_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('cities.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
