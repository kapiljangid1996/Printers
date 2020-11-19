<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$sliders = Slider::paginate(10);
        return view('admin.slider.index')->with('sliders',$sliders);
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(Request $request)
    {
        $sliders = Slider::storeSlider($request);
        return redirect()->route('slider.index')->with('success','Slider Created!');
    }

    public function edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.edit')->with('sliders',$sliders);
    }

    public function update(Request $request, $id)
    {   
        $sliders = Slider::editSlider($request,$id);
        return redirect()->route('slider.index')->with('success','Slider Updated!');
    }

    public function destroy($id)
    {
        $sliders = Slider::findOrFail($id);
        $sliders->delete();
        return redirect()->route('slider.index')->with('success','Slider Deleted!');
    }
}
