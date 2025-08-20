<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            // Check if the request is for admin routes
            if ($request->is('admin/*') || $request->is('dashboard') || $request->is('layouts/*') || $request->is('account/*')) {
                return route('login');
            }
            return route('login');
        }
        return null;
    }
}
