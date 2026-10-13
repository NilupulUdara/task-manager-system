
@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <style>
        .pagination {
            display: flex;
            gap: 6px;
            align-items: center;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .page-link {
            display: inline-block;
            padding: 7px 11px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            color: #1d4ed8;
            text-decoration: none;
        }

        .page-link:hover {
            background: #eff6ff;
        }

        .page-item.active .page-link {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: white;
        }

        .page-item.disabled .page-link {
            color: #94a3b8;
            pointer-events: none;
        }
    </style>

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
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->title }}
                            </td>

                            <td>
                                {{ ucwords(str_replace('_', ' ', $task->status)) }}
                            </td>

                            <td>
                                {{ $task->due_date?->format('Y-m-d') ?? '—' }}
                            </td>

                            <td>
                                {{ $task->created_at->format('Y-m-d') }}
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

            <div style="margin-top: 20px" aria-label="Task pagination">
                {{ $tasks->links() }}
            </div>
        @endif
    </div>
@endsection
