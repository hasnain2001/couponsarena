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
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);
        // Get the first segment of the URL

        // Define the available locales in your application
        $availableLocales = ['en', 'fr', 'es', 'nl'];

        // Set the application locale if it's a valid locale
        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
        }

        return $next($request);

        return $next($request);
    }
}
