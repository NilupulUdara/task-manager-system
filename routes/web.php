<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::patch('/tasks/{task}/status', [
    TaskController::class,
    'updateStatus'
])->name('tasks.updateStatus');

Route::resource('tasks', TaskController::class);