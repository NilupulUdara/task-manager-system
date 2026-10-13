<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::patch('/tasks/{task}/status', [
    TaskController::class,
    'updateStatus'
])->name('tasks.updateStatus');

Route::resource('tasks', TaskController::class);