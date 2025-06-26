@extends('layouts.app')
@section('content')
<div class="container py-5" style="background: #f8fafc; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Task Manager Dashboard</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary">Logout</button>
        </form>
    </div>
    <div class="row mb-4">
        <div class="col-md-8 mx-auto">
            <form method="GET" action="{{ route('dashboard') }}" class="input-group shadow-sm">
                <input type="text" name="search" value="{{ $query ?? '' }}" placeholder="Search tasks..." class="form-control" />
                <button type="submit" class="btn btn-primary">🔍 Search</button>
            </form>
        </div>
        <div class="col-md-4 text-end mt-3 mt-md-0">
            <a href="{{ route('tasks.create') }}" class="btn btn-success shadow-sm">➕ Add Task</a>
        </div>
    </div>
    <div class="row g-4">
        @foreach($tasks as $status => $group)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white d-flex align-items-center justify-content-between">
                        <span class="fw-semibold">{{ $status }}</span>
                        <span class="badge bg-{{ $status === 'To Do' ? 'secondary' : ($status === 'In Progress' ? 'info' : 'success') }}">{{ $group->count() }}</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse($group as $task)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="text-truncate" style="max-width: 120px;">📝 {{ $task->title }}</span>
                                <div class="d-flex align-items-center gap-1">
                                    @if($status !== 'Done')
                                        <form action="{{ route('tasks.update', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="{{ $status === 'To Do' ? 'In Progress' : 'Done' }}">
                                            <button class="btn btn-sm btn-outline-primary" title="Mark as {{ $status === 'To Do' ? 'In Progress' : 'Done' }}">
                                                {{ $status === 'To Do' ? '➡️' : '✅' }}
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">No tasks</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    <div id="vue-app" class="mt-5"></div>
</div>
@endsection
