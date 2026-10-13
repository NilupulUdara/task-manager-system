
@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="card">
        <h1>Task Manager</h1>
        <p>Manage your tasks in one place.</p>

        <a href="{{ route('tasks.create') }}" class="btn">
            + Create Task
        </a>
    </div>

    <div class="card">
        <form action="{{ route('tasks.index') }}" method="GET">
            <label for="search">Search tasks</label>
            <input
                id="search"
                type="text"
                name="search"
                placeholder="Search by title or description"
                value="{{ request('search') }}"
            >

            <label for="filter_status">Filter by status</label>
            <select id="filter_status" name="status">
                <option value="">All statuses</option>
                <option value="pending"
                    @selected(request('status') === 'pending')>
                    Pending
                </option>
                <option value="in_progress"
                    @selected(request('status') === 'in_progress')>
                    In Progress
                </option>
                <option value="completed"
                    @selected(request('status') === 'completed')>
                    Completed
                </option>
            </select>

            <button type="submit" class="btn">Search / Filter</button>

            <a href="{{ route('tasks.index') }}" class="btn secondary">
                Reset
            </a>
        </form>
    </div>

    <div class="card">
        <h2>All Tasks ({{ $tasks->total() }})</h2>

        @if ($tasks->isEmpty())
            <p>No tasks found. Create your first task!</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>

                            <td>
                                {{ $task->due_date?->format('Y-m-d') ?? '—' }}
                            </td>

                            <td>
                                {{ ucwords(str_replace('_', ' ', $task->status)) }}

                                <form
                                    action="{{ route('tasks.updateStatus', $task) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <select name="status"
                                        aria-label="Update task status"
                                        onchange="this.form.submit()">
                                        <option value="pending"
                                            @selected($task->status === 'pending')>
                                            Pending
                                        </option>
                                        <option value="in_progress"
                                            @selected($task->status === 'in_progress')>
                                            In Progress
                                        </option>
                                        <option value="completed"
                                            @selected($task->status === 'completed')>
                                            Completed
                                        </option>
                                    </select>
                                </form>
                            </td>

                            <td>
                                <div class="actions">
                                    <a href="{{ route('tasks.show', $task) }}"
                                        class="btn">View</a>

                                    <a href="{{ route('tasks.edit', $task) }}"
                                        class="btn secondary">Edit</a>

                                    <form
                                        action="{{ route('tasks.destroy', $task) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this task?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top: 20px">
                {{ $tasks->links() }}
            </div>
        @endif
    </div>
@endsection
