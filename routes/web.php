<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logs', [WeightLogController::class, 'index']);

Route::post('/logs', [WeightLogController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/logs/create', [WeightLogController::class, 'create']);

    Route::get('/weight/initial', function () {
    return view('weight_logs.initial');
    });

    Route::get('/dashboard', [WeightLogController::class, 'index']);

});