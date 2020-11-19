<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$settings = Setting::get();
        return view('admin.setting.index')->with('settings',$settings);
    }

    public function update(Request $request, $id)
    {   
        $settings = Setting::editSetting($request,$id);
        return \Redirect::to('admin/setting')->with('success', 'Setting Updated Successfully.');
    }
}
