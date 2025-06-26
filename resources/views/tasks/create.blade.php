@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Add Task</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
