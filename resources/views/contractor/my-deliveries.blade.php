
@extends('layouts.app')

@section('title', 'My Deliveries')

@section('content')
<div class="container py-4">
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
                <th>Status</th>
                <th>Updated At:</th>
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
                            <form action="{{ route('allocation.updateStatus', $delivery->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('POST')
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
                    <td>{{ ucfirst($delivery->status) }}</td>
                    <td>{{ $delivery->status_updated_at ? $delivery->status_updated_at->format('M d, Y H:i') : 'N/A' }}</td>


                </tr>
            @empty
                <tr>
                    <td colspan="5">No deliveries assigned.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
