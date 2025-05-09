@extends('layouts.app')

@section('content')
    <h1>Manage Contractors</h1>

    <a href="{{ route('department.contractors.create') }}" class="btn btn-primary mb-3">Add Contractor</a>

    <div class="row mb-3">
    <div class="col-md-6">
    <form method="GET" action="{{ route('department.contractors.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by contractor name or email..." value="{{ request('search') }}">
            <button class="btn btn-secondary" type="submit">Search</button>
        </div>
    </form>
    </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contractors as $contractor)
                <tr>
                    <td>{{ $contractor->name }}</td>
                    <td>{{ $contractor->email }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('department.contractors.show', $contractor->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('department.contractors.edit', $contractor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('department.contractors.destroy', $contractor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contractor?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <style>

        .content-wrapper {
            background-color: #ffffff !important;
            min-height: 100vh;
        }
    
        .table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
    
        .content {
            padding: 20px;
        }
    
        </style>
@endsection
