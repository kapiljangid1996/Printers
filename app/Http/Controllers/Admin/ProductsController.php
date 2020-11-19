<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show()
    {
       
    }

    public function index()
    {
    	$products = Product::with('category')->paginate(10);
        return view('admin.product.index')->with('products',$products);
    }

    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.product.add')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $products = Product::storeProduct($request);
        return redirect()->route('product.index')->with('success','Product Created!');
    }

    public function edit($id)
    {
        $products = Product::with('category')->find($id);
        $productimages = ProductImage::where('product_id', $id)->get();
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.product.edit')->with('categories',$categories)->with('products',$products)->with('productimages',$productimages);
    }

    public function update(Request $request, $id)
    {   
        $products = Product::editProduct($request,$id);
        return redirect()->route('product.index')->with('success','Product Updated!');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        ProductImage::where('product_id', $id)->delete();
        return redirect()->route('product.index')->with('success','Product Deleted!');
    }

    public function removeImage($id)
    {
        $productimages = ProductImage::findOrFail($id);
        unlink(public_path('Uploads/Product/') . $productimages->image);
        $productimages->delete();
        echo "Image Deleted Successfully";
    }
}
