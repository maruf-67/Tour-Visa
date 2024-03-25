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
        //fav icon
        View::composer('frontend.layouts.master', function ($view) {
            $homedata = Homepage::first();
            $view->with('homedata', $homedata);
        });

        View::composer('backend.layouts.master', function ($view) {
            $homedata = Homepage::first();

            $view->with('homedata', $homedata);
        });

        //logo
        View::composer('frontend.layouts.navbar', function ($view) {
            $homedata = Homepage::first();
            $view->with('homedata', $homedata);
        });


        View::composer('backend.layouts.asidebar', function ($view) {
            $homedata = Homepage::first();
            $view->with('homedata', $homedata);
        });
    }
}
