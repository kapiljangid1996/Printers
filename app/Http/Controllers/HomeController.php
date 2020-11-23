<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.index');
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
