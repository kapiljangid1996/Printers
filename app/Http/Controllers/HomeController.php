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

    public function productList($slug)
    {
        $category = Category::where('slug', $slug)->pluck('id');
        $products = Product::with('category')->with('productimage')->where('category_id',$category)->get();
        $category = Category::where('slug', $slug)->first();
        return view('front.product')->with('products',$products)->with('category',$category);
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
}
