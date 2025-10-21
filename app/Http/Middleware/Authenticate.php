<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

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
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
         // শুধু web routes এর জন্য redirect করো
    if ($request->expectsJson()) {
        return null; // API route-এ redirect হবে না, JSON 401 response
    }

    return route('login'); // web route-এ redirect
    }
}
