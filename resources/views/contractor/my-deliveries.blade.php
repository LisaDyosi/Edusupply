
@extends('layouts.app')

@section('title', 'My Deliveries')

@section('content')
    <h3 class="text-primary mb-4">🚚 My Deliveries</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered bg-white shadow-sm">
        <thead class="thead-light">
            <tr>
                <th>School</th>
                <th>Stationery</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Action</th>
                <th>Updated At:</th>
                <th>Discrepancy</th>
                <th>Discrepancy Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse (Auth::user()->deliveries as $delivery)
                <tr>
                    <td>{{ $delivery->school->name ?? 'N/A' }}</td>
                    <td>{{ $delivery->stationery->name ?? 'N/A' }}</td>
                    <td>{{ $delivery->quantity }}</td>
                    <td><strong>{{ ucfirst(str_replace('_', ' ', $delivery->status)) }}</strong></td>
                    <td>
                        @if ($delivery->status === 'pending')
                            <form action="{{ route('allocations.updateStatus', $delivery->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="in_transit">
                                <button type="submit" class="btn btn-warning btn-sm">Mark as In Transit</button>
                            </form>
                        @elseif ($delivery->status === 'in_transit')
                            <form method="POST" action="{{ route('allocation.confirmCode', $delivery->id) }}">
                                @csrf
                                <input type="text" name="confirmation_code" placeholder="Enter confirmation code" required>
                                <button type="submit">Confirm Delivery</button>
                            </form>
                        @endif
                    </td>
                    <td>{{ $delivery->status_updated_at ? $delivery->status_updated_at->format('M d, Y H:i') : 'N/A' }}</td>
                    <td>{{ $delivery->delivered_quantity }}</td>
                    <td>{{ ucfirst($delivery->discrepancy_status) ?? 'Pending' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">No deliveries assigned.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
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
