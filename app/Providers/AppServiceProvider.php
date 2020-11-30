<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Blog;
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
        //Category
        $categories = Category::with('children')->whereNull('parent_id')->get();
        View::share('categories', $categories);
        
        //Slider on Index Page
        View::composer('pages.slider', function($view)
        {
            $sliders = Slider::all();
            $view->with('sliders', $sliders);
        });

        //Service on Index Page
        $services = Service::all();
        View::share('services', $services);

        //Blogs on Blog Page
        View::composer('front.blog', function($view)
        {
            $blogs = Blog::all();
            $view->with('blogs', $blogs);
        });

        //Site Settings
        $settings = Setting::first();
        View::share('settings', $settings);
    }
}
