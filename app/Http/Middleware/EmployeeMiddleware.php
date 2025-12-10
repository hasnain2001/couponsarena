<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        // Check the user's role
        if (Auth::user()->role === 'employee') {
            // Define restricted routes for employees
            $restrictedRoutes = ['dashboard', 'admin.dashboard'];

            // Redirect employee to their dashboard if accessing restricted routes
            if (in_array($request->route()->getName(), $restrictedRoutes)) {
                return redirect()->route('employee.dashboard');
            }

            return $next($request); // Allow access if it's not a restricted route
        }

        // Redirect unauthorized users to a different page
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
}
