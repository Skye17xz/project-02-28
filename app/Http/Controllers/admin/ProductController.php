<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('backend.product.index');
    }

    public function createfrom()
    {
        return view('backend.product.createfrom');
    }

    public function edit()
    {
        return view('backend.product.edit');
    }

    public function insert(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->$category_id;
        if($request->hasFile('image')){
            $filename = Str::random(10). '.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/backend/product/',$filename);
            Image::make(public_path().'/backend/product/'.$filename->resize(500.450)->save(public_path(),'/backend/product/resize'));
        }else{
            $product->image = 'ไม่มีรูปภาพ';
        }
        $product->save();
        return redirect('admin/product/index');
    }
}