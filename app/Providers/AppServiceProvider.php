<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Slider;
use App\Models\Setting;

Use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Slider on front
        View::composer('pages.slider', function($view)
        {
            $sliders = Slider::all();
            $view->with('sliders', $sliders);
        });

        //Site Settings
        $settings = Setting::first();
        View::share('settings', $settings);
    }
}
