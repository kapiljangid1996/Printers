<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = ['title','slug','editor','long_description', 'short_description', 'image', 'meta_name', 'meta_keyword', 'meta_description', 'sort_order', 'status'];

    public static function storeBlog($request)
    {
        $request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'  => 'required|min:2|unique:blogs,slug',
            'editor'  => 'required|min:2|max:255|string',
            'long_description'  => 'required|min:3',
            'short_description'  => 'required|min:3',
            'image'  => 'sometimes|nullable',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'sort_order' => 'sometimes|nullable',
            'status' => 'boolean',
        ]);
        $blogs = new Blog(); 
        $blogs -> title = request('title');
        $blogs -> slug = request('slug');
        $blogs -> editor = request('editor');
        $blogs -> long_description = request('long_description');
        $blogs -> short_description = request('short_description');
        $blogs -> meta_name = request('meta_name');
        $blogs -> meta_description = request('meta_description');
        $blogs -> meta_keyword = request('meta_keyword');
        $blogs -> status = request('status');
        if (request()->hasfile('image'))
        {
            $imageName =$request->get('slug')."-".request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Blogs'), $imageName); 
            $blogs->image = $imageName;
        }
        $blogs->save();
    }

    public static function editBlog($request,$id)
    {
        $request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'  => 'required|min:2',
            'editor'  => 'required|min:2|max:255|string',
            'long_description'  => 'required|min:3',
            'short_description'  => 'required|min:3',
            'image'  => 'sometimes|nullable',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'sort_order' => 'sometimes|nullable',
            'status' => 'boolean',
        ]);
        $blogs = Blog::find($id);
        $blogs -> title = $request->input('title');
        $blogs -> slug = $request->input('slug');
        $blogs -> editor = $request->input('editor');
        $blogs -> long_description = $request->input('long_description');
        $blogs -> short_description = $request->input('short_description');
        $blogs -> meta_name = $request->input('meta_name');
        $blogs -> meta_description = $request->input('meta_description');
        $blogs -> meta_keyword = $request->input('meta_keyword');
        $blogs -> status = $request->input('status');
        $old_image = $request->input('old_image');
        if ($request->hasfile('image'))
        {
            if(!empty($old_image))
            {
                unlink(public_path("Uploads/Blogs/{$old_image}"));
            }
            $slug = $request->get('slug');
            $imageName =$slug.'-'.request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Blogs'), $imageName); 
            $blogs->image = $imageName;
        }
        $blogs->save();
    }
}
