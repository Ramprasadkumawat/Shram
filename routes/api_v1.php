<?php
use App\Http\Controllers\Api\V1\Owner\UserController;
use App\Http\Controllers\Api\V1\Owner\PostController;

Route::middleware('auth:sanctum')->group(function () {
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
