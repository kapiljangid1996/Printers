<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$blogs = Blog::paginate(10);
        return view('admin.blog.index')->with('blogs',$blogs);
    }

    public function create()
    {
        return view('admin.blog.add');
    }

    public function store(Request $request)
    {
        $blogs = Blog::storeBlog($request);
        return redirect()->route('blog.index')->with('success','Blog Created!');
    }

    public function edit($id)
    {
        $blogs = Blog::find($id);
        return view('admin.blog.edit')->with('blogs',$blogs);
    }

    public function update(Request $request, $id)
    {   
        $blogs = Blog::editBlog($request,$id);
        return redirect()->route('blog.index')->with('success','Blog Updated!');
    }

    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);
        $blogs->delete();
        return redirect()->route('blog.index')->with('success','Blog Deleted!');
    }
}
