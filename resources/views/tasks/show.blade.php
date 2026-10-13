
@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <div class="card">
        <h1>{{ $task->title }}</h1>

        <p>
            <strong>Description:</strong><br>
            {{ $task->description ?: 'No description provided.' }}
        </p>

        <p>
            <strong>Status:</strong>
            {{ ucwords(str_replace('_', ' ', $task->status)) }}
        </p>
        
        <p>
            <strong>Due Date:</strong>
            {{ $task->due_date?->format('Y-m-d') ?? 'Not set' }}
        </p>

        <p>
            <strong>Created Date:</strong>
            {{ $task->created_at->format('Y-m-d H:i') }}
        </p>

        <a href="{{ route('tasks.edit', $task) }}" class="btn">
            Edit Task
        </a>

        <a href="{{ route('tasks.index') }}" class="btn secondary">
            Back
        </a>
    </div>
@endsection
