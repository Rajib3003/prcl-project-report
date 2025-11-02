<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // For API requests we should not redirect to a web login route.
        // If the request expects JSON (Accept: application/json) or is an API path
        // (commonly /api/*) return null so Laravel returns a 401 JSON response
        // instead of attempting to redirect to a `login` route that may not exist.
        if ($request->expectsJson() || $request->is('api/*')) {
            return null; // causes an AuthenticationException -> 401 JSON
        }

        // Only attempt to return the web login route if it's defined.
        if (Route::has('login')) {
            return route('login');
        }

        // No login route defined — treat as API/unauthenticated.
        return null;
    }
}
