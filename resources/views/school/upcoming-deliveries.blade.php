@extends('layouts.app')

@section('title', 'Upcoming Deliveries')

@section('content')
<div class="container mt-4">
    <h3 class="text-primary">📦 Upcoming Deliveries</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Stationery</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Confirmation Code</th>
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
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No deliveries found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
