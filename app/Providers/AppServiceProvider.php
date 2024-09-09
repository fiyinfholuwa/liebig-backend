<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Ribbon;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {

            $view->with('ribbon', Ribbon::first());
            $view->with('latest_news', Blog::latest()->paginate(4));
        });

    }
}
