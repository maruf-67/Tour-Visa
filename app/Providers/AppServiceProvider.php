<?php

namespace App\Providers;

use App\Models\Homepage;
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
        View::composer('frontend.layouts.master', function ($view) {
            $settings = Homepage::first();
            $favicon = $settings ? $settings->fav_icon : '';
            $view->with('favicon', $favicon);
        });

        View::composer('backend.layouts.master', function ($view) {
            $settings = Homepage::first();
            $favicon = $settings ? $settings->fav_icon : '';
            $view->with('favicon', $favicon);
        });
    }
}
