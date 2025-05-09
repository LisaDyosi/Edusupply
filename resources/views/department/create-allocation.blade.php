@extends('layouts.app')

@section('title', 'Allocate Stationery')

@section('content')
<div class="dashboard-heading">
    <h3 class="text-success">➕ Allocate Stationery</h3>
</div>
 <div class="container">
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
