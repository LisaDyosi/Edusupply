@extends('layouts.app')

@section('title', 'Allocate Stationery')

@section('content')
<div class="container">
    <h3 class="text-success">➕ Allocate Stationery</h3>

    <form action="{{ route('allocation.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Stationery</label>
            <select name="stationery_id" class="form-control" required>
                @foreach ($stationeries as $stationery)
                    <option value="{{ $stationery->id }}">{{ $stationery->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">School</label>
            <select name="school_id" class="form-control" required>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Contractor</label>
            <select name="contractor_id" class="form-control" required>
                @foreach ($contractors as $contractor)
                    <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Allocate</button>
    </form>
</div>
@endsection
