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
                    <td>{{ $allocation->discrepancy !== null ? $allocation->discrepancy : 'N/A' }}</td>
                    <td>
                        @if (auth()->user()->role === 'department')
                            <form action="{{ route('allocation.updateDiscrepancyStatus', $allocation->id) }}" method="POST" class="d-flex">
                                @csrf
                                @method('PATCH')
                                <select name="discrepancy_status" class="form-select form-select-sm me-2">
                                    <option value="pending" {{ $allocation->discrepancy_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="attending" {{ $allocation->discrepancy_status === 'attending' ? 'selected' : '' }}>Attending</option>
                                    <option value="fixed" {{ $allocation->discrepancy_status === 'fixed' ? 'selected' : '' }}>Fixed</option>
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
@endsection