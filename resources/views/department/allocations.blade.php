@extends('layouts.app')

@section('title', 'Allocations')

@section('content')
<div class="container">
    <h3 class="text-primary">📦 Stationery Allocations</h3>
    <a href="{{ route('allocation.create') }}" class="btn btn-success mb-3">➕ Allocate Stationery</a>

    <table class="table">
        <thead>
            <tr>
                <th>Stationery</th>
                <th>School</th>
                <th>Contractor</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allocations as $allocation)
                <tr>
                    <td>{{ $allocation->stationery->name }}</td>
                    <td>{{ $allocation->school->name }}</td>
                    <td>{{ $allocation->contractor->name }}</td>
                    <td>{{ $allocation->quantity }}</td>
                    <td>{{ ucfirst($allocation->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
