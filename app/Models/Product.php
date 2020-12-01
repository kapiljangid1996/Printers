<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'category_id', 'long_description', 'short_description', 'meta_name', 'meta_description', 'meta_keyword', 'sort_order', 'status', 'featured'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }

    public function productimage()
    {
    	return $this->hasMany('App\Models\ProductImage');
    }

    public static function storeProduct($request)
    {
    	$request->validate([
            'name'  => 'required|min:2|max:255|string',
            'slug'  => 'required|min:2|unique:products,slug',
            'category_id' => 'required|sometimes|nullable',
            'long_description'  => 'required|min:3',
            'short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_keyword'  => 'required|min:3',
            'meta_description'  => 'required|min:3',
            'status' => 'boolean',
            'featured' => 'boolean',
        ]);
        $products = new Product(); 
        $products -> name = request('name');
        $products -> slug = request('slug');
        $products -> category_id = request('category_id');
        $products -> long_description = request('long_description');
        $products -> short_description = request('short_description');
        $products -> meta_name = request('meta_name');
        $products -> meta_description = request('meta_description');
        $products -> meta_keyword = request('meta_keyword');
        $products -> status = request('status');  
        $products -> featured = request('featured');  
        $products->save(); 

        $lastInsertedId= $products->id;
        $image=array();

        if ($files=$request->file('image'))
        {
            foreach($files as $file)
            { 
                $productimages = new ProductImage();
                $productimages -> product_id = $lastInsertedId;                             
                $imageName =$request->get('slug')."-".$file->getClientOriginalName();
                $file->move(public_path('Uploads/Product'), $imageName); 
                $image[] = $imageName;
                $productimages->image = $imageName; 
                $productimages->save(); 
            }  
        }
    }

    public static function editProduct($request,$id)
    {
    	$request->validate([
            'name'  => 'required|min:2|max:255|string',
            'slug'  => 'required|min:2|',
            'category_id' => 'required|sometimes|nullable',
            'long_description'  => 'required|min:3',
            'short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_keyword'  => 'required|min:3',
            'meta_description'  => 'required|min:3',
            'status' => 'boolean',
            'featured' => 'boolean',
        ]);
        $products = Product::find($id);
        $products -> name = $request->input('name');
        $products -> slug = $request->input('slug');
        $products -> category_id = $request->input('category_id');
        $products -> long_description = $request->input('long_description');
        $products -> short_description = $request->input('short_description');
        $products -> meta_name = $request->input('meta_name');
        $products -> meta_description = $request->input('meta_description');
        $products -> meta_keyword = $request->input('meta_keyword');
        $products -> status = $request->input('status');
        $products -> featured = $request->input('featured');
        $products->save();

        $image=array();

        if ($files=$request->file('image'))
        {
            foreach($files as $file)
            {
                $productimages = new ProductImage();
                $productimages -> product_id = $request->input('product_id');                              
                $imageName =$request->get('slug')."-".$file->getClientOriginalName();
                $file->move(public_path('Uploads/Product'), $imageName); 
                $productimages -> image = $imageName; 
                $productimages->save();
            }  
        }
    }
}
