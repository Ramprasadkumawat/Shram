<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

class CustomRouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Load API v1 routes with proper middleware
        Route::middleware('api')
            ->prefix('api/v1')
            ->group(base_path('routes/api_v1.php'));
        
        // Load main API routes
        Route::middleware('api')
            ->prefix('api/v1')
            ->group(base_path('routes/api.php'));

        // Load admin routes
        Route::middleware('web')
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));
    }
}
