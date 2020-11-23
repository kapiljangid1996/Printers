<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$services = Service::paginate(10);
        return view('admin.service.index')->with('services',$services);
    }

    public function create()
    {
        return view('admin.service.add');
    }

    public function store(Request $request)
    {
        $services = Service::storeService($request);
        return redirect()->route('service.index')->with('success','Service Created!');
    }

    public function edit($id)
    {
        $services = Service::find($id);
        return view('admin.service.edit')->with('services',$services);
    }

    public function update(Request $request, $id)
    {   
        $services = Service::editService($request,$id);
        return redirect()->route('service.index')->with('success','Service Updated!');
    }

    public function destroy($id)
    {
        $services = Service::findOrFail($id);
        $services->delete();
        return redirect()->route('service.index')->with('success','Service Deleted!');
    }
}
