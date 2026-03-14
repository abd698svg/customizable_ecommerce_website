<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    // Display the admin login view.
    public function create()
    {
        return view('/admin/login'); 
    }

    // Handle an incoming admin authentication request.
    public function store(LoginRequest $request)
    {
        // Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Authenticate the user using the default 'web' guard
        $request->authenticate();
        
        // Get the authenticated user
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Check if the user is an admin (using a role column)
        if (! $user->isAdmin()) {   // You'll define this method on the User model
            // If not admin: log them out immediately
            Auth::logout();
        }

        // Return success response
        return response()->json([
            'message' => 'Login successful',
        ], 200);
    }
}
