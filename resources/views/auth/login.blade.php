@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="card shadow-lg">
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

  <style>
    .card {
    width: 100%;
    border-radius: 10px;
    }
  </style>
@endsection
