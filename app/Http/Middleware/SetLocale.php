<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve the locale from the route parameters
        $locale = $request->route('locale');

        // Define the supported locales
        $supportedLocales = ['en', 'nl', 'fr', 'es', 'de', 'pl',];

        // Check if the locale is supported
        if (in_array($locale, $supportedLocales)) {
            // Set the locale for the application
            App::setLocale($locale);
        } else {
            // Default to English or any other fallback
            App::setLocale('en');
        }

        return $next($request);
    }
}
