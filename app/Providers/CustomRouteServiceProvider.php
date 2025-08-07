<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

class CustomRouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // $filesystem = new Filesystem();
        Route::middleware('api')
            ->prefix('api/v1')
            ->group(base_path('routes/api_v1.php'));

        Route::middleware('web')
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));
            
        }
        
}
