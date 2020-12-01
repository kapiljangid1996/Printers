<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = ['title','slug','long_description', 'short_description', 'image', 'meta_name', 'meta_keyword', 'meta_description', 'sort_order', 'publish'];

    public static function storePage($request)
    {
        $request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'  => 'required|min:2|unique:pages,slug',
            'long_description'  => 'required|min:3',
            'short_description'  => 'required|min:3',
            'image'  => 'sometimes|nullable',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'sort_order' => 'sometimes|nullable',
            'publish' => 'boolean',
        ]);
        $pages = new Page(); 
        $pages -> title = request('title');
        $pages -> slug = request('slug');
        $pages -> long_description = request('long_description');
        $pages -> short_description = request('short_description');
        $pages -> meta_name = request('meta_name');
        $pages -> meta_description = request('meta_description');
        $pages -> meta_keyword = request('meta_keyword');
        $pages -> publish = request('publish');
        if (request()->hasfile('image'))
        {
            $imageName =$request->get('slug')."-".request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Page'), $imageName); 
            $pages->image = $imageName;
        }
        $pages->save();
    }

    public static function editPage($request,$id)
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
            'publish' => 'boolean',
        ]);
        $pages = Page::find($id);
        $pages -> title = $request->input('title');
        $pages -> slug = $request->input('slug');
        $pages -> long_description = $request->input('long_description');
        $pages -> short_description = $request->input('short_description');
        $pages -> meta_name = $request->input('meta_name');
        $pages -> meta_description = $request->input('meta_description');
        $pages -> meta_keyword = $request->input('meta_keyword');
        $pages -> publish = $request->input('publish');
        $old_image = $request->input('old_image');
        if ($request->hasfile('image'))
        {
            if(!empty($old_image))
            {
                unlink(public_path("Uploads/Page/{$old_image}"));
            }
            $slug = $request->get('slug');
            $imageName =$slug.'-'.request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Page'), $imageName); 
            $pages->image = $imageName;
        }
        $pages->save();
    }
}
