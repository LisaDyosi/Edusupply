@extends('layouts.app')

@section('title', 'Upcoming Deliveries')

@section('content')

    <h3 class="text-primary">📦 Upcoming Deliveries</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Stationery</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Confirmation Code</th>
                <th>Track Delivery</th>
                {{-- <th>Updated at:</th> --}}
            </tr>
        </thead>
        <tbody>
            @if (Auth::user()->allocations && count(Auth::user()->allocations) > 0)
                @foreach (Auth::user()->allocations as $allocation)
                    <tr>
                        <td>{{ $allocation->stationery->name }}</td>
                        <td>{{ $allocation->quantity }}</td>
                        <td>{{ ucfirst($allocation->status) }}</td>
                        <td>
                            @if ($allocation->status === 'in_transit')
                                <strong>{{ $allocation->confirmation_code }}</strong>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('deliveries.track', $allocation->id) }}" class="btn btn-sm btn-secondary">Track</a>
                        </td>
                        {{-- <td>
                            @if($allocation->status_updated_at)
                                <br><small class="text-muted">Updated: {{ $allocation->status_updated_at->format('d M Y, H:i') }}</small>
                            @endif
                        </td> --}}
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No deliveries found.</td>
                </tr>
            @endif 
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
