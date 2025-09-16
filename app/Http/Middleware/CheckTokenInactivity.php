<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Constants\ApiConstants;

class CheckTokenInactivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('sanctum')->check()) {
            $token = Auth::guard('sanctum')->user()->currentAccessToken();
            
            if ($token && $token->last_used_at) {
                $lastUsed = Carbon::parse($token->last_used_at);
                $inactiveMinutes = config('sanctum.inactivity_timeout', 15);

                if (Carbon::now()->diffInMinutes($lastUsed) > $inactiveMinutes) {
                    $token->delete();
                    return response()->json(['message' => ApiConstants::UNAUTHORIZED_ERROR], 401);
                }
            }
        }
        
        return $next($request);
    }
}

