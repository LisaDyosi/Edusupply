@extends('layouts.app')

@section('content')
    <h1 class="mb-4">{{ $school->name }} Allocations</h1>

    <a href="{{ route('department.schools.allocations.create', $school->id) }}" class="btn btn-success mb-3">Allocate Stationery</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($allocations->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Stationery</th>
                <th>Quantity</th>
                <th>Contractor</th>
                <th>Status</th>
                <th>Discrepancy</th>
                <th>Discrepancy Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allocations as $allocation)
            <tr>
                <td>{{ $allocation->stationery->name }}</td>
                <td>{{ $allocation->quantity }}</td>
                <td>{{ $allocation->contractor->name }}</td>
                <td>{{ ucfirst($allocation->status) }}</td>
                <td>{{ $allocation->delivered_quantity ?? 0 }}</td>
                <td>
                    @if($allocation->discrepancy > 0)
                        <form action="{{ route('allocations.updateDiscrepancyStatus', $allocation->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="discrepancy_status" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                                <option value="pending" {{ $allocation->discrepancy_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="attending" {{ $allocation->discrepancy_status == 'Attending' ? 'selected' : '' }}>Attending</option>
                                <option value="fixed" {{ $allocation->discrepancy_status == 'Fixed' ? 'selected' : '' }}>Fixed</option>
                            </select>
                        </form>
                    @else
                        N/A
                    @endif
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @else
        <p>No allocations found for this school.</p>
    @endif
    <style>

        .content-wrapper {
            background-color: #ffffff !important;
            min-height: 100vh;
        }

        .content {
            padding: 20px;
        }
    
        </style>
@endsection
