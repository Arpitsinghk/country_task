@extends('layouts.app')

@section('title', 'States')

@section('content')
<div class="container mt-4">
    <h1 class="text-center h3 mb-4">States</h1>
    <div class="my-4">
        <a href="{{ route('home') }}" class="btn btn-info btn-sm">Back</a>
        <a href="{{ route('states.create') }}" class="btn btn-success btn-sm">Create New State</a>
        <a href="{{ route('states.index') }}" class="btn btn-secondary btn-sm">Reset Filter</a>
    </div>

    <!-- Search Form -->
    <form method="GET" action="{{ route('states.index') }}" class="mb-4">
        <div class="input-group w-100">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search states..." aria-label="Search states">
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        </div>
    </form>
</div>

<!-- States Table -->
<div class="container mt-4">
    <div class="table-responsive" style="height: 250px; overflow: auto;">
        <table class="table table-bordered table-hover">
            <thead class="table-light position-sticky top-0">
                <tr>
                    <th>S.No</th>
                    <th>State Name</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($states as $index => $state)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $state->state_name }}</td>
                    <td>{{ $state->country->country_name }}</td>
                    <td>
                        <a href="{{ route('states.edit', $state->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('states.destroy', $state->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this state?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No states found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center">
    {!! $states->links('pagination::bootstrap-5') !!}
</div>
@endsection
