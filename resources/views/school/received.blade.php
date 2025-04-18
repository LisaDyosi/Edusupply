@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-success">📦 Received Stationery</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Stationery</th>
                <th>Quantity</th>
                <th>Delivered On</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($received as $allocation)
                <tr>
                    <td>{{ $allocation->stationery->name }}</td>
                    <td>{{ $allocation->quantity }}</td>
                    <td>{{ $allocation->status_updated_at ? $allocation->status_updated_at->format('d M Y, H:i') : 'Not updated yet' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No received stationery yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
