<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.category.index');
    }

    public function createfrom()
    {
        return view('backend.category.createfrom');
    }

    public function edit()
    {
        return view('backend.category.edit');
    }

    public function insert(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect('admin/category/index');
    }
}
