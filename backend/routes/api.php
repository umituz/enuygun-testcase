<?php

use App\Http\Controllers\Api\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TasksController::class, 'index']);
