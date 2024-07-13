<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;
use App\Helpers\JsonFlatten;
use Illuminate\Support\Facades\View;

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
        //
        View::composer([
            'welcome',
        ], function ($view) {
            $tab = 1;
            $view->with('tab', $tab);
        });

        View::composer([
            'about_us',
        ], function ($view) {
            $tab = 2;
            $view->with('tab', $tab);
        });

        View::composer([
            'services',
        ], function ($view) {
            $tab = 3;
            $view->with('tab', $tab);
        });

        View::composer([
            'rooms',
        ], function ($view) {
            $tab = 4;
            $view->with('tab', $tab);
        });

        View::composer([
            'activities',
        ], function ($view) {
            $tab = 5;
            $view->with('tab', $tab);
        });

        View::composer([
            'faq',
        ], function ($view) {
            $tab = 6;
            $view->with('tab', $tab);
        });

        View::composer([
            'contact',
        ], function ($view) {
            $tab = 7;
            $view->with('tab', $tab);
        });
    }
}
