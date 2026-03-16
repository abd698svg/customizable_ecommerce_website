<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminProtectMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        // Check if the authenticated user is an admin
        if (!$user || !$user->isAdmin()) {
            // Not an admin - redirect to home
            return redirect('/')->with('error', 'You must be an admin to access this page.');
        }

        // Is admin - allow access
        return $next($request);
    }
}