
@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="card">
        <h1>Edit Task</h1>

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            @include('tasks.form')

            <button type="submit" class="btn">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn secondary">
                Cancel
            </a>
        </form>
    </div>
@endsection
