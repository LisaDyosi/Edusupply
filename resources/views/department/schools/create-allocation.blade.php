@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Allocate Stationery for {{ $school->name }}</h1>

    <form action="{{ route('department.schools.allocations.store', $school->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="stationery_id" class="form-label">Stationery</label>
            <select name="stationery_id" id="stationery_id" class="form-control" required>
                @foreach($stationeries as $stationery)
                    <option value="{{ $stationery->id }}">{{ $stationery->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Contractor</label>
            <select name="contractor_id" class="form-control" required>
                @foreach($contractors as $contractor)
                    <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Allocate</button>
    </form>
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
