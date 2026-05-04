<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//Route Read & Delete
Route::get('/tasks', [TaskController::class, 'index']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);