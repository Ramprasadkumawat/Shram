<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;


class CustomRouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        $this->routes(function () {
            // ✅ Correctly namespaced + grouped admin routes
            Route::middleware('web')
                ->prefix('admin')
                ->as('admin.') // ✅ This is the correct method for naming prefix
                ->group(base_path('routes/admin.php'));

        // Load API v1 routes with proper middleware
        Route::middleware('api')
            ->prefix('api/v1')
            ->group(base_path('routes/api_v1.php'));
        
        // Load main API routes
        Route::middleware('api')
            ->prefix('api/v1')
            ->group(base_path('routes/api.php'));

        // Load admin routes with web middleware (for session support)
        // Route::middleware('web')
        //     ->prefix('admin')            // ✅ all URLs start with /admin
        //     ->name('admin.')             // ✅ all route names start with admin.
        //     ->group(base_path('routes/admin.php'));
    });
}
}
