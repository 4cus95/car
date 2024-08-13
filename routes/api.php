<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\CarsController;

Route::post('/create-token', [TokenController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/all_cars', [CarsController::class, 'all']);
    Route::post('/get_cars', [CarsController::class, 'getAvailableCars']);
});
