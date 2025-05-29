@extends('layouts.app')

@section('title', 'Cities')

@section('content')
<div class="container mt-4">
    <h1 class="text-center h3 mb-4">Cities</h1>

    <div class=" my-4">
        <a href="{{ route('home') }}" class="btn btn-info btn-sm">Back</a>
         <a href="{{ route('cities.create') }}" class="btn btn-success btn-sm">Create New City</a>
        <a href="{{ route('cities.index') }}" class="btn btn-secondary btn-sm">Reset Filter</a>
    </div>
    <!-- Search Form -->
    <form method="GET" action="{{ route('cities.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search cities..." aria-label="Search cities">
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>

        </div>
    </form>

   

    <!-- Cities Table -->
    <div class="container mt-4">
        <div class="table-responsive" style="height: 200px; overflow: auto;">
            <table class="table table-bordered table-hover">
                <thead class="table-light position-sticky top-0">
                    <tr>
                        <th>No</th>
                        <th>City Name</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cities as $index => $city)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $city->city_name }}</td>
                        <td>{{ $city->state->state_name }}</td>
                        <td>{{ $city->state->country->country_name }}</td>
                        <td>
                            <!-- <a href="{{ route('cities.show', $city->id) }}" class="btn btn-info btn-sm">Show</a> -->
                            <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this city?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No cities found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {!! $cities->links('pagination::bootstrap-5') !!}
    </div>

</div>
@endsection