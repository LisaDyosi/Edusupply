@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-wrapper d-flex justify-content-center align-items-center">
    <div class="login-container card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h4>Login</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label>Email Address:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <div class="text-center mt-2">
                    <a href="#">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .login-wrapper {
        min-height: calc(100vh - 70px); 
        padding-top: 50px;
        padding-bottom: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fff;
    } 

    .login-container {
        width: 40%;
        max-height: 500px;
        border-radius: 10px;
    }

    .login-container input[type="email"],
    .login-container input[type="password"] {
        padding: 0.75rem;
    }

    .login-container .card-header {
        background-color: #007bff !important; 
        color: #ffffff !important;
        border-radius: 10px 10px 0 0;
        border-bottom: none;
    }

    .login-container .btn-primary {
        background-color: #007bff !important;
        border-color: #007bff !important;
        color: #ffffff !important;
        padding: 0.75rem;
        border-radius: 5px;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .login-container .btn-primary:hover {
        background-color: #0056b3 !important; 
        border-color: #0056b3 !important;
    }

    .content-wrapper {
        margin-left: 0 !important;
        padding-bottom: 0 !important;
    }

</style>
@endsection
