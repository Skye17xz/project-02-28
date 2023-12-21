<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
