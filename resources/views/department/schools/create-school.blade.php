@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Add New School</h1>

    <form action="{{ route('department.schools.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">School Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">School Address</label>
            <textarea name="address" id="address" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">School Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Add School</button>
    </form>
@endsection
