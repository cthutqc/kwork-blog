<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Category;
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
        if(app()->isProduction()) {
            \URL::forceScheme('https');
        }

        View::composer(['components.header', 'components.sidebar'], function ($view) {
            $view->with('categories', Category::all());
        });

        View::composer(['components.banner'], function ($view){
           $view->with('banner', Banner::find(1));
        });
    }
}
