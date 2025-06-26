@extends('layouts.app')
@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh; background: #f8fafc;">
    <div class="card shadow p-4" style="min-width: 350px; max-width: 400px; width: 100%;">
        <h3 class="mb-4 text-center fw-bold">Login to Task Manager</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            @if($errors->any())
                <div class="alert alert-danger py-2">
                    {{ $errors->first() }}
                </div>
            @endif
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3 text-center">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </div>
</div>
@endsection
