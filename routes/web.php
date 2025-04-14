<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::controller(TaskController::class)->group(function ()
{
    Route::post('/tasks', 'create');
    Route::get('/tasks', 'index');
    Route::get('/tasks/{id}','show');
    Route::put('/tasks/{id}', 'update');
    Route::delete('/tasks/{id}', 'delete');
});

