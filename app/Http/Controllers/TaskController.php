<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = $request->input('search');
        $tasksQuery = $user->tasks();

        if ($query) {
            $tasksQuery->where('title', 'like', "%$query%");
        }

        $tasks = [
            'To Do' => (clone $tasksQuery)->where('status', 'To Do')->get(),
            'In Progress' => (clone $tasksQuery)->where('status', 'In Progress')->get(),
            'Done' => (clone $tasksQuery)->where('status', 'Done')->get(),
        ];

        return view('dashboard', compact('tasks', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        Auth::user()->tasks()->create([
            'title' => $request->title,
            'status' => 'To Do',
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);
        $request->validate([
            'status' => 'required|in:To Do,In Progress,Done',
        ]);
        $task->update(['status' => $request->status]);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('dashboard');
    }
}
