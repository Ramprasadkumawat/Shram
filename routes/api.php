<?php
// This file is commonly used for API routes in the application.
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Owner\UserController;
use App\Http\Controllers\Api\V1\Owner\PostController;
use App\Http\Controllers\Api\V1\Common\AuthController;
// use App\Http\Controllers\Api\V1\Common\LocationController; 
    
    Route::middleware('api')
    ->group(function () {
        // Auth Routes
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);

        // Removed Location Routes from here as it requires authentication
    });


    Route::middleware('auth:sanctum')
    ->group(function () {
        // Auth Routes
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/logout-all', [AuthController::class, 'logoutAll']);
        Route::get('/me', [AuthController::class, 'me']);

        // Location Routes
        // Route::get('/common/location', [LocationController::class, 'getLocation']);

        // Users Routes
        Route::get('/users', [UserController::class, 'index']);

        // Posts Routes
        Route::post('/owner/posts', [PostController::class, 'store']);          // Create a new post
        Route::get('/owner/posts', [PostController::class, 'index']);           // List all posts
        Route::get('/owner/posts/{id}', [PostController::class, 'show']);       // Show a single post
        Route::put('/owner/posts/{id}', [PostController::class, 'update']);     // Update a post
        Route::patch('/owner/posts/{id}', [PostController::class, 'update']);   // Update a post (alternative)
        Route::delete('/owner/posts/{id}', [PostController::class, 'destroy']); // Delete a post
    });

