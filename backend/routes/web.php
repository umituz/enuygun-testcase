<?php

use App\Http\Controllers\Api\ProvidersController;
use App\Http\Controllers\Api\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TasksController::class, 'index']);
Route::get('/providers', [ProvidersController::class, 'getProviderTaskList']);
