@extends('layouts.app')

@section('title', 'Support')

@section('content')

<!-- Support Center Intro -->
<div class="card p-4 shadow-sm mb-3">
    <h4 class="text-primary">💬 EduSupply Support Center</h4>
    <p>If you’re facing issues or have questions, we’re here to help. Please review the FAQs below or contact us directly for urgent concerns.</p>
</div>

<!-- FAQs Section -->
<div class="card p-3 shadow-sm bg-light mb-3">
    <h5 class="text-success">❓ Frequently Asked Questions</h5>
    <ul class="list-group">
        <li class="list-group-item border-0">
            <strong>Q:</strong> My delivery had fewer items than allocated. What now?<br>
            <strong>A:</strong> Log the received quantity during confirmation. A discrepancy report will be generated for provincial follow-up.
        </li>
        <li class="list-group-item border-0">
            <strong>Q:</strong> I’m a contractor, how do I confirm delivery?<br>
            <strong>A:</strong> After marking a delivery as complete, enter the 5-digit code given to the school when marked 'In Transit'.
        </li>
    </ul>
</div>

<!-- Contact & Tips -->
<div class="row mb-3">
    <div class="col-md-6">
        <div class="card p-3 shadow-sm bg-white">
            <h5 class="text-warning">📞 Contact Support</h5>
            <ul class="list-group">
                <li class="list-group-item border-0">📧 <strong>Email:</strong> <a href="mailto:support@edusupply.com">support@edusupply.com</a></li>
                <li class="list-group-item border-0">📱 <strong>Phone:</strong> 0800-EDUSUP (Mon–Fri, 9am–5pm)</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-3 shadow-sm bg-light">
            <h5 class="text-danger">💡 Tips for Faster Support</h5>
            <ul class="list-group">
                <li class="list-group-item border-0">Include your name, role, and institution.</li>
                <li class="list-group-item border-0">Attach screenshots of the issue.</li>
                <li class="list-group-item border-0">List any troubleshooting steps you've tried.</li>
            </ul>
        </div>
    </div>
</div>

@endsection
