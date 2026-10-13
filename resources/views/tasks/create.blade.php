
@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <div class="card">
        <h1>Create New Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            @include('tasks.form')

            <button type="submit" class="btn">Create Task</button>
            <a href="{{ route('tasks.index') }}" class="btn secondary">
                Cancel
            </a>
        </form>
    </div>
@endsection
