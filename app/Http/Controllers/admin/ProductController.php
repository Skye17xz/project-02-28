<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use File;
use Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $product = Product::orderBy('created_at','desc')->Paginate(10);
        return view('backend.product.index',compact('product'));
}

    public function createfrom(){
    return view('backend.product.createfrom');
}

    public function edit(){
    return view('backend.product.edit');
}

    public function insert(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if($request->hasFile('image')){
            $filesname = Str::random(10). '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/backend/product/',$filesname);
            Image::make(public_path().'/backend/product/'. $filesname)->resize(500,450)->save(public_path().'/backend/product/resize/'.$filesname);
            $product->image = $filesname;
        }else{
             $product->image = 'ไม่มีรูปภาพ';
        }
        $product->save( );
        return redirect('admin/product/index');
}
}