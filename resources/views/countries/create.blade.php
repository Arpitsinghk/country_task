@extends('layouts.app')

@section('title', 'Create Country')

@section('content')
<div class="container">
    <h1 class="text-center h4 mb-4">Create Country</h1>
    <form action="{{ route('countries.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="country_name" class="form-label">Country Name</label>
            <input type="text" class="form-control" id="country_name" name="country_name" required>
        </div>
        <button type="submit" class="btn btn-primary  btn-sm">Save</button>
        <a href="{{ route('countries.index') }}" class="btn btn-info btn-sm">Back</a>
    </form>
    </div>
@endsection
