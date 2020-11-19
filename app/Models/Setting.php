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
        $settings = Setting::find($id);
        $settings -> title = $request->input('title');
        $settings -> email1 = $request->input('email1');
        $settings -> email2 = $request->input('email2');
        $settings -> contact1 = $request->input('contact1');
        $settings -> contact2 = $request->input('contact2');
        $settings -> address1 = $request->input('address1');
        $settings -> address2 = $request->input('address2');
        $settings -> google = $request->input('google');
        $settings -> facebook = $request->input('facebook');
        $settings -> linkedin = $request->input('linkedin');
        $settings -> twitter = $request->input('twitter');
        $settings -> footer = $request->input('footer');
        $settings -> meta_name = $request->input('meta_name');
        $settings -> meta_description = $request->input('meta_description');
        $settings -> meta_keyword = $request->input('meta_keyword');
        $settings -> google_analyst = $request->input('google_analyst');
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
            $settings->logo = $imageName;
        }
        $settings->save();
    }
}
