@extends('layouts.app')

@section('content')
<h3 class="mb-4">📦 Delivery Tracking</h3>


<div class="progress-wrapper mb-5">
    <div class="progress-line">
        <div class="progress-fill" style="width:
            @if($allocation->status == 'pending') 0%
            @elseif($allocation->status == 'in_transit') 50%
            @elseif($allocation->status == 'delivered') 100%
            @endif;
        "></div>
    </div>

    <div class="progress-steps d-flex justify-content-between text-center mt-2">
        
        <div class="step">
            <div class="circle active">
            </div>
            <div class="label mt-2">Pending</div>
            <div class="timestamp">
                Allocated at: {{ $allocation->created_at->format('d M Y, H:i') }}
            </div>
        </div>

        <div class="step">
            <div class="circle {{ in_array($allocation->status, ['in_transit', 'delivered']) ? 'active' : '' }}"></div>
            <div class="label mt-2">In Transit</div>
            <div class="timestamp">
                @if(in_array($allocation->status, ['in_transit', 'delivered']))
                    Updated At: {{ $allocation->status_updated_at->format('d M Y, H:i') }}
                @else
                    Not yet in transit
                @endif
            </div>
        </div>

        <div class="step">
            <div class="circle {{ $allocation->status == 'delivered' ? 'active' : '' }}"></div>
            <div class="label mt-2">Delivered</div>
            <div class="timestamp">
                @if($allocation->status == 'delivered')
                    Updated at: {{ $allocation->updated_at->format('d M Y, H:i') }}
                @else
                    Not yet delivered
                @endif
            </div>
        </div>
    </div>
</div>
<a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-4">← Back</a>
<style>
    .progress-wrapper {
        position: relative;
        padding: 0 10px;
    }

    .progress-line {
        position: relative;
        height: 6px;
        background-color: #dee2e6;
        border-radius: 3px;
    }

    .progress-fill {
        position: absolute;
        height: 100%;
        background-color: #28a745;
        border-radius: 3px;
        transition: width 0.4s ease;
        z-index: 1;
    }

    .progress-steps {
        position: relative;
        top: -14px;
    }

    .step {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .circle {
        width: 24px;
        height: 24px;
        background-color: #ccc;
        border-radius: 50%;
        z-index: 2;
        border: 2px solid white;
        box-shadow: 0 0 0 2px #dee2e6;
    }

    .circle.active {
        background-color: #28a745;
        box-shadow: 0 0 0 2px #28a745;
    }

    .label {
        font-size: 14px;
    }

    .timestamp {
        font-size: 12px;
        color: #555;
        margin-top: 5px;
    }

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
