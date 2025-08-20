<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    // Use view composer to share menu data when views are actually being rendered
    $this->app->booted(function () {
      try {
        $verticalMenuPath = base_path('resources/menu/verticalMenu.json');
        
        if (file_exists($verticalMenuPath)) {
          $verticalMenuJson = file_get_contents($verticalMenuPath);
          $verticalMenuData = json_decode($verticalMenuJson);
          
          if ($verticalMenuData) {
            View::share('menuData', [$verticalMenuData]);
          }
        }
      } catch (\Exception $e) {
        // Log error but don't break the application
        \Log::warning('MenuServiceProvider: Could not load menu data - ' . $e->getMessage());
      }
    });
  }
}
