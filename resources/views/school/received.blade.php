@extends('layouts.app')


@section('content')
    <h3 class="text-success">📦 Received Stationery</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Stationery</th>
                <th>Allocated Quantity</th>
                <th>Delivered On</th>
                <th>Delivered Quantity</th>
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
                        @if ($allocation->delivered_quantity === null)
                            <form action="{{ route('allocation.logDiscrepancy', $allocation->id) }}" method="POST" style="display: flex; align-items: center;">
                                @csrf
                                <input type="number" name="delivered_quantity" min="0" 
                                       class="form-control form-control-sm" 
                                       style="margin-right: 10px; width: 80px;" 
                                       placeholder="Delivered">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        @else
                            {{ $allocation->delivered_quantity }}
                        @endif
                        </td>        
                        <td>{{ $allocation->discrepancy }}</td>
                    <td>{{ ucfirst($allocation->discrepancy_status) ?? 'Pending' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No received stationery yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-4">← Back</a>
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
