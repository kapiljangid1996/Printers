<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$pages = Page::paginate(10);
        return view('admin.page.index')->with('pages',$pages);
    }

    public function create()
    {
        return view('admin.page.add');
    }

    public function store(Request $request)
    {
        $pages = Page::storePage($request);
        return redirect()->route('page.index')->with('success','Page Created!');
    }

    public function edit($id)
    {
        $pages = Page::find($id);
        return view('admin.page.edit')->with('pages',$pages);
    }

    public function update(Request $request, $id)
    {   
        $pages = Page::editPage($request,$id);
        return redirect()->route('page.index')->with('success','Page Updated!');
    }

    public function destroy($id)
    {
        $pages = Page::findOrFail($id);
        $pages->delete();
        return redirect()->route('page.index')->with('success','Page Deleted!');
    }
}
