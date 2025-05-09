@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Schools</h1>

    <a href="{{ route('department.schools.create') }}" class="btn btn-primary mb-3">Add New School</a>

    <div class="row mb-3">
    <div class="col-md-6">
    <form method="GET" action="{{ route('department.schools.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by school name or email..." value="{{ request('search') }}">
            <button class="btn btn-secondary" type="submit">Search</button>
        </div>
    </form>
    </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>School Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schools as $school)
            <tr>
                <td>{{ $school->name }}</td>
                <td>{{ $school->address }}</td>
                <td>{{ $school->email }}</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('department.schools.show', $school->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('department.schools.edit', $school->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('department.schools.destroy', $school->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this school?')">
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
