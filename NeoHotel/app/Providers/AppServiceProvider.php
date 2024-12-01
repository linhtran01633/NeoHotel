<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;
use App\Helpers\JsonFlatten;
use App\Models\Banner;
use Illuminate\Support\Facades\Schema;
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

        $banner_images = '';
        $banner_images_mobile = '';

        if (Schema::hasTable('banners')) {
            $data = Banner::where('delete_flag', 0)->first();

            if($data) {
                $banner_images = $data->images;
                $banner_images_mobile = $data->images_mobile;
            }
        }

        View::composer([
            '*',
        ], function ($view) use($banner_images, $banner_images_mobile) {
            $view->with('banner_images', $banner_images);
            $view->with('banner_images_mobile', $banner_images_mobile);
        });

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
