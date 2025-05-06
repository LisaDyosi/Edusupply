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
@endsection
