<?php

namespace App\Providers;

use App\Models\Blog;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Pluralizer;
use App\Models\Categories;
use App\Models\Language;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\Models\Stores;
use App\Models\Category;
use App\Observers\SitemapObserver;

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
        Stores::observe(SitemapObserver::class);
        Blog::observe(SitemapObserver::class);
        Categories::observe(SitemapObserver::class);
    }
}
