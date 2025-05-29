@extends('layouts.app')

@section('title', 'Edit Country')

@section('content')
    <h1 class="text-center h4 mb-4">Edit Country</h1>
    <form action="{{ route('countries.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="country_name" class="form-label">Country Name</label>
            <input type="text" class="form-control" id="country_name" name="country_name" value="{{ $country->country_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="{{ route('countries.index') }}" class="btn btn-info btn-sm">back</a>
    </form>
@endsection
