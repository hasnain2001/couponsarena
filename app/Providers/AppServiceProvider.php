<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Pluralizer;
use App\Models\Categories;
use App\Models\Language;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::addNamespace('errors', resource_path('views/errors'));
    
        Blade::component('navbar', \App\View\Components\Navbar::class);
        Blade::component('footer', \App\View\Components\Footer::class);

    
        // Share categories and languages across all views
        View::composer('*', function ($view) {
            $view->with('categories', Categories::all());
            $view->with('langs', Language::all());
            $view->with('currentLang', Session::get('language', 'EN')); 
        });

        $locale = request()->segment(1);
    if (!in_array($locale, ['en', 'es', 'fr', 'ur'])) {
        $locale = 'en'; // Set your default locale
    }
    App::setLocale($locale);
    }
}
