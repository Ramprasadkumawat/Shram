<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\V1\AuthController;
use App\Http\Controllers\Admin\V1\DashboardController;
use App\Http\Controllers\Admin\V1\UserController;
use App\Http\Controllers\Admin\V1\LayoutController;
use App\Http\Controllers\Admin\V1\AccountController;

// Public routes (no authentication required)
// Route::get('/', function () {
//     return redirect()->route('admin.dashboard');
// });

// Single login route
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route::post('/login', function (){
//      echo "hello ji..."; exit;
// })->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('users', UserController::class);
});


// Route::post('/login', function () {
//     print_r("hello ji...");
//     exit;
// })->name('admin.login.post');

// Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
