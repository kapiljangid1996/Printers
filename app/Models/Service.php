<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = ['title','slug', 'image', 'long_description', 'short_description', 'meta_name', 'meta_keyword', 'meta_description', 'sort_order', 'status'];

    public static function storeService($request)
    {
        $request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'  => 'required|min:2|unique:services,slug',
            'long_description'  => 'required|min:3',
            'short_description'  => 'required|min:3',
            'image'  => 'sometimes|nullable',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'sort_order' => 'sometimes|nullable',
            'status' => 'boolean',
        ]);
        $services = new Service(); 
        $services -> title = request('title');
        $services -> slug = request('slug');
        $services -> long_description = request('long_description');
        $services -> short_description = request('short_description');
        $services -> meta_name = request('meta_name');
        $services -> meta_description = request('meta_description');
        $services -> meta_keyword = request('meta_keyword');
        $services -> status = request('status');
        if (request()->hasfile('image'))
        {
            $imageName =$request->get('slug')."-".request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Service'), $imageName); 
            $services->image = $imageName;
        }
        $services->save();
    }

    public static function editService($request,$id)
    {
        $request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'  => 'required|min:2',
            'long_description'  => 'required|min:3',
            'short_description'  => 'required|min:3',
            'image'  => 'sometimes|nullable',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'sort_order' => 'sometimes|nullable',
            'status' => 'boolean',
        ]);
        $services = Service::find($id);
        $services -> title = $request->input('title');
        $services -> slug = $request->input('slug');
        $services -> long_description = $request->input('long_description');
        $services -> short_description = $request->input('short_description');
        $services -> meta_name = $request->input('meta_name');
        $services -> meta_description = $request->input('meta_description');
        $services -> meta_keyword = $request->input('meta_keyword');
        $services -> status = $request->input('status');
        $old_image = $request->input('old_image');
        if ($request->hasfile('image'))
        {
            if(!empty($old_image))
            {
                unlink(public_path("Uploads/Service/{$old_image}"));
            }
            $slug = $request->get('slug');
            $imageName =$slug.'-'.request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Service'), $imageName); 
            $services->image = $imageName;
        }
        $services->save();
    }
}
