@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Edit Task</h2>
    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="To Do" {{ $task->status == 'To Do' ? 'selected' : '' }}>To Do</option>
                <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Done" {{ $task->status == 'Done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
