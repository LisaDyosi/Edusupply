@extends('layouts.app')

@section('title', 'Guidelines')

@section('content')

<!-- Guidelines Introduction -->
<div class="card p-4 shadow-sm mb-3">
    <h4 class="text-primary">📌 EduSupply Guidelines</h4>
    <p>To ensure smooth operation and support, please follow these guidelines when using EduSupply. These apply to all users including school administrators, contractors, and provincial officials.</p>
</div>

<!-- Usage Guidelines -->
<div class="card p-3 shadow-sm bg-light mb-3">
    <h5 class="text-success">✅ Proper System Usage</h5>
    <ul class="list-group">
        <li class="list-group-item border-0">📦 Always confirm deliveries within 24 hours of receipt.</li>
        <li class="list-group-item border-0">📋 Submit accurate stationery requests to avoid delays.</li>
        <li class="list-group-item border-0">🔍 Double-check allocation reports before escalating issues.</li>
        <li class="list-group-item border-0">🔒 Keep login credentials secure and do not share access.</li>
    </ul>
</div>

<!-- Communication Expectations -->
<div class="card p-3 shadow-sm bg-white mb-3">
    <h5 class="text-warning">📣 Communication & Support</h5>
    <p>Reach out to support only after checking your dashboard, FAQs, and confirming the issue isn’t resolved through usual procedures.</p>
    <ul class="list-group">
        <li class="list-group-item border-0">🕒 Support is available weekdays, 9am – 5pm.</li>
        <li class="list-group-item border-0">📞 Contact the team for urgent issues.</li>
        <li class="list-group-item border-0">📸 Include screenshots or error messages when reporting problems.</li>
    </ul>
</div>

<!-- Code of Conduct -->
<div class="card p-3 shadow-sm bg-light">
    <h5 class="text-danger">🚨 Code of Conduct</h5>
    <ul class="list-group">
        <li class="list-group-item border-0">🙅‍♀️ Misuse of the platform may lead to restricted access.</li>
        <li class="list-group-item border-0">👥 Respect all users and support staff.</li>
        <li class="list-group-item border-0">📑 Always maintain accurate records in the system.</li>
    </ul>
</div>

@endsection