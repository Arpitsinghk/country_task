@extends('layouts.app')

@section('title', 'Countries')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center h4 mb-4">Countries</h1>
         <div class=" my-4">        
            <a href="{{ route('home') }}" class="btn btn-info btn-sm">Back</a>
            <a href="{{ route('countries.create') }}" class="btn btn-success  btn-sm">Create New Country</a>
            <a href="{{ route('countries.index') }}" class="btn btn-secondary btn-sm">Reset Filter</a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('countries.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search countries..." aria-label="Search countries">
                <button type="submit" class="btn btn-primary  btn-sm">Search</button>
            </div>
                        

        </form>

       

        <!-- Countries Table -->
        <div class="table-responsive" style="height: 200px; overflow: auto;">
        <table class="table table-bordered table-hover">
                <thead class="table-light position-sticky top-0">
                    <tr>
                        <th>S.No</th>
                        <th>Country Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($countries as $index => $country)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $country->country_name }}</td>
                            <td>
                                <!-- <a href="{{ route('countries.show', $country->id) }}" class="btn btn-info btn-sm">Show</a> -->
                                <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this country?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No countries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {!! $countries->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
