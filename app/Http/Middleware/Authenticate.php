<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

      protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            // Admin routes
            if ($request->is('admin/*')) {
                return route('admin.login.form');
            }

            // Customer routes
            return route('customer.login.form');
        }
    }
}
