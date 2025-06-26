@extends('layouts.app')
@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh; background: #f8fafc;">
    <div class="card shadow p-4" style="min-width: 350px; max-width: 400px; width: 100%;">
        <h3 class="mb-4 text-center fw-bold">Register for Task Manager</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            @if($errors->any())
                <div class="alert alert-danger py-2">
                    {{ $errors->first() }}
                </div>
            @endif
            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>
        <p class="mt-3 text-center">Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
</div>
@endsection
