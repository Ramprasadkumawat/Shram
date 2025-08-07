<?php

use Illuminate\Support\Facades\Route;

Route::middleware('api')
    ->prefix('v1') // Optional: versioning
    ->group(function () {
        Route::get('/users', [\App\Http\Controllers\Api\V1\UserController::class, 'index']);
        // Add more v1 routes here
    });
