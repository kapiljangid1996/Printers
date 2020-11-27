<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function product($slug)
    {
        $category = Category::where('slug', $slug)->pluck('id');
        $products = Product::with('category')->with('productimage')->where('category_id',$category)->get();
        $category = Category::where('slug', $slug)->first();
        return view('front.product')->with('products',$products)->with('category',$category);
    }

    public function productDetail($slug)
    {
        $products = Product::with('productimage')->where('slug',$slug)->get();
        return view('front.productdetail')->with('products',$products);
    }

    public function service()
    {
        return view('front.service');
    }

    public function serviceDetails($slug)
    {
        $services = Service::where('slug',$slug)->get();
        return view('front.servicedetail')->with('services',$services);
    }

    public function about()
    {
        return view('front.about');
    }

    public function blog()
    {
        return view('front.blog');
    }

    public function contact()
    {
        return view('front.contact');
    }
}
