<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        // Define the available locales in your application
        $availableLocales = ['en', 'fr', 'es', 'de', 'nl', 'au','ch','it','se','cz'];

        // Set the application locale if it's a valid locale, otherwise default to 'en'
        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
        } else {
            App::setLocale('en'); // Set a default locale if needed
        }

        return $next($request);
    }
}
