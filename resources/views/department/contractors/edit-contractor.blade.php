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
@endsection
