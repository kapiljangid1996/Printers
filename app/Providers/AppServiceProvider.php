<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Category;
use App\Models\Product;
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

        //Products on Index Page
        View::composer('front.index', function($view)
        {
            $products = Product::where('featured',1)->where('status',1)->orderBy('id', 'desc')->take(8)->get();;
            $view->with('products', $products);
        });
        
        //Slider on Index Page
        View::composer('pages.slider', function($view)
        {
            $sliders = Slider::all();
            $view->with('sliders', $sliders);
        });

        //Service on Index Page
        View::composer('front.index', function($view)
        {
            $services = Service::where('status',1)->orderBy('id', 'desc')->take(4)->get();
            $view->with('services', $services);
        });

        //Blogs on Blog Page
        View::composer('front.blog', function($view)
        {
            $blogs = Blog::where('status',1)->get();
            $view->with('blogs', $blogs);
        });

        //Site Settings
        $settings = Setting::first();
        View::share('settings', $settings);
    }
}
