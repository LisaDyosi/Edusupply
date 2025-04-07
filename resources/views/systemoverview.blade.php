@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <!-- Introduction Card -->
    <div class="card p-4 shadow-sm mb-3">
        <h4 class="text-primary">📚 Welcome to EduSupply</h4>
        <p>EduSupply is your one-stop solution for managing school stationery logistics efficiently. Track deliveries, request items, and stay informed effortlessly.</p>
        <a href="#" class="btn btn-outline-primary">Learn More</a>
    </div>

    <!-- Key Features -->
    <div class="card p-3 shadow-sm bg-light mb-3">
        <h5 class="text-success">🚀 Why Use EduSupply?</h5>
        <ul class="list-group">
            <li class="list-group-item border-0">✅ Real-time tracking of deliveries</li>
            <li class="list-group-item border-0">✅ Instant stationery requests</li>
            <li class="list-group-item border-0">✅ Automated reporting & analytics</li>
            <li class="list-group-item border-0">✅ User-friendly dashboard for easy management</li>
        </ul>
    </div>

    <!-- Testimonials Section -->
    <div class="card p-3 shadow-sm bg-white">
        <h5 class="text-warning">⭐ What Users Say</h5>
        <blockquote class="blockquote">
            <p>“EduSupply transformed how we handle school supplies. No more shortages or delays!”</p>
            <footer class="blockquote-footer">Principal, Green Valley School</footer>
        </blockquote>
        <blockquote class="blockquote">
            <p>“A must-have tool for every school administrator.”</p>
            <footer class="blockquote-footer">Education Officer, District 5</footer>
        </blockquote>
    </div>

    <!-- Additional Information Section -->
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card p-4 text-center shadow-sm bg-info text-white">
                <h5>📊 Statistics</h5>
                <p>Over <strong>1000+</strong> deliveries completed this year.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 text-center shadow-sm bg-warning text-white">
                <h5>🌎 Global Reach</h5>
                <p>Used by <strong>10+</strong> schools in the North West province.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 text-center shadow-sm bg-danger text-white">
                <h5>🚀 Instant Requests</h5>
                <p>99% of stationery requests are fulfilled within <strong>48 hours</strong>.</p>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="col-md-12">
        <div class="card p-4 shadow-sm border-0">
            <h4 class="text-center text-secondary fw-bold">❓ Frequently Asked Questions</h4>
            <div class="accordion mt-3" id="faqAccordion">
                
                <!-- FAQ Item 1 -->
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="faq1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                            How do I reset my password?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Click on "Forgot Password?" on the login form and follow the instructions.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="faq2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                            Can I track deliveries in real-time?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes! Our dashboard provides live tracking updates for all deliveries.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="faq3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                            Who can use EduSupply?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            EduSupply is designed for school administrators, district officials, and contractors managing supplies.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript (Required for Accordion) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Modern FAQ Styling -->
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }

        /* FAQ Section Styling */
        .accordion {
            border-radius: 8px;
            background-color: transparent;
            max-width: 700px;
            margin: auto;
        }

        /* Question Button */
        .accordion-button {
            font-weight: 600;
            font-size: 15px;
            color: #333;
            background: transparent;
            border-bottom: 1px solid #ddd;
            padding: 12px 16px;
            transition: all 0.3s ease-in-out;
        }

        /* Hover Effect */
        .accordion-button:hover {
            background-color: #f8f9fa;
        }

        /* Opened Question */
        .accordion-button:not(.collapsed) {
            background-color: transparent;
            color: #007bff;
            box-shadow: none;
            font-size: 16px;
        }

        /* Answer Box */
        .accordion-body {
            background: transparent;
            font-size: 14px;
            color: #555;
            padding: 12px 16px;
        }

        /* Remove default accordion styles */
        .accordion-item {
            border: none;
        }

        .container {
            max-width: 1200px;
        }

        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .feature-card {
            width: 48%;
            min-height: 120px;
            padding: 15px;
            border-radius: 10px;
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .testimonial-card {
            width: 48%;
            padding: 15px;
            border-left: 5px solid #ffc107;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .stats-container {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .stat-card {
            width: 24%;
            padding: 15px;
            text-align: center;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
        }

        @media (max-width: 991px) {
            .flex-container {
                flex-direction: column;
                align-items: center;
            }

            .feature-card, .testimonial-card {
                width: 100%;
            }

            .stat-card {
                width: 48%;
            }
        }

        @media (max-width: 768px) {
            .stat-card {
                width: 100%;
            }
        }
    </style>

@endsection
