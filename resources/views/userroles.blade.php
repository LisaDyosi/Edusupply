@extends('layouts.app')

@section('title', 'User Roles & Access')

@section('content')

<!-- Intro Section -->
<div class="card p-4 shadow-sm mb-3">
    <h4 class="text-primary">👥 User Roles & Access</h4>
    <p>This section outlines the responsibilities and permissions assigned to each user role within the EduSupply system.</p>
</div>

<!-- Roles Overview -->
<div class="card p-3 shadow-sm bg-light">
    <h5 class="text-success">🔑 Role Descriptions</h5>
    <ul class="list-group">
        <li class="list-group-item border-0"><strong>Admin:</strong> Full access to manage users, data, settings, and system configurations.</li>
        <li class="list-group-item border-0"><strong>School:</strong> Can view allocations, confirm deliveries, and report discrepancies.</li>
        <li class="list-group-item border-0"><strong>Contractor:</strong> Access to assigned deliveries and update delivery status using unique codes.</li>
        <li class="list-group-item border-0"><strong>Province:</strong> View all schools’ data, oversee allocation processes, and manage discrepancy reports.</li>
    </ul>
</div>

@endsection
