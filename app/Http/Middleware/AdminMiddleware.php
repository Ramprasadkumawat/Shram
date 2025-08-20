<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login');
        }

        $user = Auth::guard('admin')->user();
        
        if ($user->type !== 'admin') {
            Auth::guard('admin')->logout();
            return redirect()->route('login')->withErrors([
                'email' => 'You do not have admin privileges.',
            ]);
        }

        return $next($request);
    }
}
