<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $view->with('services', getServices());
        });
        View::composer('*', function ($view) {
            $view->with('recent_blogs', getBlogs());
        });
        View::composer('*', function ($view) {
            $view->with('apparence', apparence());
        });
        View::composer('*', function ($view) {
            $view->with('settings', settings());
        });
    }
}
