@extends('layouts.app')

@section('title', 'Create State')

@section('content')
    <h1 class="text-center h4 mb-4">Create State</h1>
    <form action="{{ route('states.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="country_id" class="form-label">Country</label>
            <select name="country_id" id="country_id" class="form-control" required>
                <option value="">Select Country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="state_name" class="form-label">State Name</label>
            <input type="text" name="state_name" id="state_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
        <a href="{{ route('states.index') }}" class="btn btn-info btn-sm">Back</a>
    </form>
@endsection
