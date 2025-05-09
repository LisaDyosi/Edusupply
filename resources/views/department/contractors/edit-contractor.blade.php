@extends('layouts.app')

@section('content')
    <h1>Edit Contractor</h1>

    <form action="{{ route('department.contractors.update', $contractor->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $contractor->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $contractor->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Cellphone number</label>
            <input type="email" name="email" value="{{ $contractor->phone }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Contractor</button>
    </form>
    <a href="{{ route('department.contractors.index') }}" class="btn btn-secondary">Back</a>
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
