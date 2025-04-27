@extends('layouts.app')


@section('content')
<div class="dashboard-heading">
    <h3 class="text-success">📦 Received Stationery</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
</div>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Stationery</th>
                <th>Quantity</th>
                <th>Delivered On</th>
                <th>Discrepancy</th>
                <th>Discrepancy Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($received as $allocation)
                <tr>
                    <td>{{ $allocation->stationery->name }}</td>
                    <td>{{ $allocation->quantity }}</td>
                    <td>
                        {{ $allocation->status_updated_at ? $allocation->status_updated_at->format('d M Y, H:i') : 'Not updated yet' }}
                    </td>
                    <td>
                        @if ($allocation->discrepancy === null)
                            <form action="{{ route('allocation.logDiscrepancy', $allocation->id) }}" method="POST" style="display: flex; align-items: center;">
                                @csrf
                                <input type="number" name="discrepancy" min="0" 
                                       class="form-control form-control-sm" 
                                       style="margin-right: 10px; width: 50px;">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        @else
                            {{ $allocation->discrepancy }}
                        @endif
                    </td>
                    
                    <td>{{ ucfirst($allocation->discrepancy_status) ?? 'Pending' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No received stationery yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
