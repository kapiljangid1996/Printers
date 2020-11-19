<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = ['title', 'slug', 'long_description', 'image', 'button_text', 'button_link'];

    public static function storeSlider($request)
    {
    	$request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'  => 'required|min:2|max:255|string',
            'long_description'  => 'required|min:3',
            'image'  => 'sometimes|nullable',
            'button_text'  => 'required|min:3|max:255|string',
            'button_link'  => 'required|min:3',
        ]);
        $sliders = new Slider(); 
        $sliders -> title = request('title');
        $sliders -> slug = request('slug');
        $sliders -> long_description = request('long_description');
        $sliders -> button_text = request('button_text');
        $sliders -> button_link = request('button_link');
        if (request()->hasfile('image'))
        {
            $imageName =$request->get('slug')."-".request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Slider'), $imageName); 
            $sliders->image = $imageName;
        }
        $sliders->save();
    }

    public static function editSlider($request,$id)
    {
    	$request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'  => 'required|min:2|max:255|string',
            'long_description'  => 'required|min:3',
            'image'  => 'sometimes|nullable',
            'button_text'  => 'required|min:3|max:255|string',
            'button_link'  => 'required|min:3',
        ]);
        $sliders = Slider::find($id);
        $sliders -> title = $request->input('title');
        $sliders -> slug = $request->input('slug');
        $sliders -> long_description = $request->input('long_description');
        $sliders -> button_text = $request->input('button_text');
        $sliders -> button_link = $request->input('button_link');
        $old_image = $request->input('old_image');
        if ($request->hasfile('image'))
        {
            if(!empty($old_image))
            {
                unlink(public_path("Uploads/Slider/{$old_image}"));
            }
            $slug = $request->get('slug');
            $imageName =$slug.'-'.request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Slider'), $imageName); 
            $sliders->image = $imageName;
        }
        $sliders->save();
    }
}
