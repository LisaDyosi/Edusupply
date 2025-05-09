@extends('layouts.app')

@section('title', 'Allocations')

@section('content')
    <div class="dashboard-heading">
    <h3 class="text-primary">📦 Stationery Allocations</h3>
    <a href="{{ route('allocation.create') }}" class="btn btn-success mb-3">➕ Allocate Stationery</a>
    </div>
 <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Stationery</th>
                <th>School</th>
                <th>Contractor</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Delivered Quantity</th>
                <th>Discrepancy</th>
                <th>Discrepancy Status</th>
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
                    <td>{{ $allocation->delivered_quantity }}</td>
                    <td>{{ $allocation->discrepancy }}</td>
                    <td>
                        @if (auth()->user()->role === 'department')
                            <form action="{{ route('allocation.updateDiscrepancyStatus', $allocation->id) }}" method="POST" class="d-flex">
                                @csrf
                                @method('PATCH')
                                <select name="discrepancy_status" class="form-select form-select-sm me-2">
                                    <option value="Pending" {{ $allocation->discrepancy_status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Attending" {{ $allocation->discrepancy_status === 'Attending' ? 'selected' : '' }}>Attending</option>
                                    <option value="Fixed" {{ $allocation->discrepancy_status === 'Fixed' ? 'selected' : '' }}>Fixed</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        @else
                            {{ ucfirst($allocation->discrepancy_status) }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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