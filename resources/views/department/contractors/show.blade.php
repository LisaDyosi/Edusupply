@extends('layouts.app')

@section('content')
    <h1>{{ $contractor->name }}'s Allocations</h1>

    @if($allocations->isEmpty())
        <p>No allocations found for this contractor.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Stationery</th>
                    <th>School</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allocations as $allocation)
                    <tr>
                        <td>{{ $allocation->stationery->name }}</td>
                        <td>{{ $allocation->school->name }}</td>
                        <td>{{ $allocation->quantity }}</td>
                        <td>{{ ucfirst($allocation->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('department.contractors.index') }}" class="btn btn-secondary">Back</a>
@endsection
