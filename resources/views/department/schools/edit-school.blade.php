@extends('layouts.app')

@section('content')
    <h1>Edit School</h1>

    <form action="{{ route('department.schools.update', $school->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $school->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" value="{{ $school->address }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $school->email }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update School</button>
    </form>
    <a href="{{ route('department.schools.index') }}" class="btn btn-secondary">Back</a>
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
