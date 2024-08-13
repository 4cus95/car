<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\CarsController;

Route::post('/create-token', [TokenController::class, 'store']);

Route::group([
    'prefix' => 'cars',
    'middleware' => 'auth:sanctum'
], function () {
    Route::post('/all', [CarsController::class, 'all']);
    Route::post('/available', [CarsController::class, 'getAvailableCars']);
});
