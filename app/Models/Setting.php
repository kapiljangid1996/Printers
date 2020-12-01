<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = ['title', 'logo', 'email1', 'email2', 'contact1', 'contact2', 'address1', 'address2', 'google', 'facebook', 'linkedin', 'twitter', 'footer' , 'meta_name', 'meta_keyword', 'meta_description', 'google_analyst'];

    public static function editSetting($request,$id)
    {
    	$request->validate([
            'title'  => 'required|min:2|max:255|string',
            'logo'  => 'sometimes|nullable',
            'email1' => 'required|sometimes|nullable',
            'email2'  => 'required|min:3',
            'contact1'  => 'required|min:3',
            'contact2'  => 'required|min:3',
            'address1'  => 'required|min:3',
            'address2'  => 'required|min:3',
            'google'  => 'required|min:3',
            'facebook'  => 'required|min:3',
            'linkedin'  => 'required|min:3',
            'twitter'  => 'required|min:3',
            'footer'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'google_analyst'  => 'required|min:3',
        ]);
        $setting = Setting::find($id);
        $setting -> title = $request->input('title');
        $setting -> email1 = $request->input('email1');
        $setting -> email2 = $request->input('email2');
        $setting -> contact1 = $request->input('contact1');
        $setting -> contact2 = $request->input('contact2');
        $setting -> address1 = $request->input('address1');
        $setting -> address2 = $request->input('address2');
        $setting -> google = $request->input('google');
        $setting -> facebook = $request->input('facebook');
        $setting -> linkedin = $request->input('linkedin');
        $setting -> twitter = $request->input('twitter');
        $setting -> footer = $request->input('footer');
        $setting -> meta_name = $request->input('meta_name');
        $setting -> meta_description = $request->input('meta_description');
        $setting -> meta_keyword = $request->input('meta_keyword');
        $setting -> google_analyst = $request->input('google_analyst');
        $old_logo = $request->input('old_logo');
        if ($request->hasfile('logo'))
        {
            if(!empty($old_logo))
            {
                unlink(public_path("Uploads/Site/{$old_logo}"));
            }
            $title = $request->get('title');
            $imageName =$title.'-'.request()->logo->getClientOriginalName();
            request()->logo->move(public_path('Uploads/Site'), $imageName); 
            $setting->logo = $imageName;
        }
        $setting->save();
    }
}
