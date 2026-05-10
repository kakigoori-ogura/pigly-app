<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\GoalController;

Route::get('/', function () {
    return redirect('/logs');
});

Route::middleware('auth')->group(function () {

    Route::get('/logs', [WeightLogController::class, 'index']);

    Route::post('/logs', [WeightLogController::class, 'store']);

    Route::get('/logs/create', [WeightLogController::class, 'create']);

    Route::get('/weight/initial', [WeightLogController::class, 'initial']);
    Route::post('/weight/initial', [WeightLogController::class, 'initialStore']);

    Route::get('/goal/edit', [GoalController::class, 'edit']);
    Route::post('/goal/update', [GoalController::class, 'update']);
});